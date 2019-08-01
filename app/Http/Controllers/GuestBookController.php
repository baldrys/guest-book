<?php

namespace App\Http\Controllers;

use App\GuestMessage;
use App\Http\Requests\GuestBookMessageRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    
    /**
     * Вовзращаент число сообщений на страницу из файла конфигурации
     *
     * @return int
     */
    private function getPerPage() {
        return (int)config('constants.pagination');
    }

    /**
     * Отображение главной страницы
     *
     * @param  mixed $request
     *
     * @return view
     */
    public function index(Request $request)
    {
        $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($this->getPerPage());
        return view('index', ['messages' => $messages]);
    }

    /**
     * Обновление капчи с помощью ajax
     *
     * @param  mixed $request
     *
     * @return img
     */
    public function ajaxRefreshCaptcha(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        } else {
            return captcha_img();
        };
    }

    /**
     * Добавление сообщения с помощью ajax
     *
     * @param  GuestBookMessageRequest $request
     *
     * @return view
     */
    public function ajaxAddMessage(GuestBookMessageRequest $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        } else {
            $guestMessage = GuestMessage::create([
                'username' => $request['username'],
                'email' => $request['email'],
                'homeapge' => $request['homeapge'],
                'text' => $request['message'],
                'created_at' => Carbon::parse($request['createdAt']),
            ]);

            if ($request['tags']) {
                $guestMessage->attachTags(preg_split('/\s+/', $request['tags']));
            }
            $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($this->getPerPage(), ['*'], 'page', $request['page']);
            $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
            return response()->json([
                'paginationMessages' => $paginationMessages,
            ]);
        }
    }

    /**
     * Отображение новой порции сообщений при переходи на другую страницу(пагинация) с помощью ajax
     *
     * @param  mixed $request
     *
     * @return view
     */
    public function ajaxGetPaginateMessages(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        } else {
            $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($this->getPerPage());
            $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
            return response()->json([
                'paginationMessages' => $paginationMessages,
            ]);
        }

    }

    /**
     * Поиск с помощью ajax
     *
     * @param  mixed $request
     *
     * @return view
     */
    public function ajaxSearch(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        } else {
            $q = $request['search'];
            if ($q) {
                $query = GuestMessage::withAnyTags([$q])
                    ->orwhere('username', $q)
                    ->orWhere('email', $q);
                if ((bool) strtotime($q)) {
                    $query = $query->orWhere('created_at', Carbon::parse($q));
                }
                $messages = $query->orderBy('created_at', 'desc')->paginate($this->getPerPage());

            } else {
                $messages = GuestMessage::orderBy('created_at', 'desc')->paginate($this->getPerPage());
            }
            $paginationMessages = view("includes/pagination-messages", ['messages' => $messages])->render();
            return response()->json([
                'paginationMessages' => $paginationMessages,
            ]);

        }

    }
}
