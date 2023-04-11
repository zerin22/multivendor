@foreach ($customers as $customer)
<tr>
    <td>
        <input type="checkbox" name="check[]" class="form-check-input"
            value="{{ $customer->id }}">
    </td>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $customer->name }}</td>
    <td>{{ $customer->email }}</td>
    <td>
        <a href="{{ route('single_email_offer', $customer->id) }}"
            class="btn btn-md rounded font-sm">SEND</a>
    </td>
    @php
        $last_id = $customer->id
    @endphp
</tr>
@endforeach

</tbody>
</table>

<div class=" text-center">
    <a href="#!" id="loadMoreButton" data-count="{{ $last_id }}" class=" btn btn-md rounded font-sm ">
    Load More
    </a>
</div>


