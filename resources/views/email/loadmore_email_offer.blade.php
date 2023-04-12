@foreach ($customers as $customer)
<tr>
    <td>
        <input type="checkbox" name="check[]" class="form-check-input"
            value="{{ $customer->id }}">
    </td>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $customer->id }}-={{ $customer->name }}</td>
    <td>{{ $customer->email }}</td>
    <td>
        <a href="{{ route('single_email_offer', $customer->id) }}"
            class="btn btn-md rounded font-sm">SEND</a>
    </td>
    {{-- <td>{{ $last_id }}</td> --}}
</tr>

@php($last_id = $customer->id)
@endforeach
{{ Session::put('lastUserId', $last_id) }}



