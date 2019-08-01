<tr>
  <td>{{ $message->username }}</td>
  <td>{{ $message->email }}</td>
  <td>{{ $message->text }}</td>
  <td>{{ $message->tagsToString() }}</td>
  <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
</tr>