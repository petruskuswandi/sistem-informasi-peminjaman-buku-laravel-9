<div>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">User</th>
                <th class="text-center">Book</th>
                <th class="text-center">Rent Date</th>
                <th class="text-center">Return Date</th>
                <th class="text-center">Actual Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
                <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'text-white bg-danger' : 'text-white bg-success') }}">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->user->username }}</td>
                    <td class="text-center">{{ $item->book->title }}</td>
                    <td class="text-center">{{ $item->rent_date }}</td>
                    <td class="text-center">{{ $item->return_date }}</td>
                    <td class="text-center">{{ $item->actual_return_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
