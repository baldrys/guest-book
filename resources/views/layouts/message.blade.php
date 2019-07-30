<tr>
  <td>{{ $message->username }}</td>
  <td>{{ $message->text }}</td>
  <td> {{ $message->tagsToString() }} </td>
  <td>{{ $message->created_at }}</td>
</tr>