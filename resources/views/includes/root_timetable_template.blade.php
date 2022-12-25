<td class="px-6 py-4 text-sm text-gray-500 border">
    <div><b>Course:</b>  {{ $day->course($day->course) }}</div>
    <div><b>Venue:</b>  {{ $day->venue }}</div>
    <div><b>Time:</b>  {{ $day->start_date }} - {{ $day->end_date }}</div>
    <div>
        <span class="flex">
            <form action="{{ route('timetable-edit', $day->id) }}" method="GET">
                @csrf 
                <input type="submit" value="EDIT" class="edit-btn">
            </form>
            &nbsp;&nbsp;
            <form action="{{ route('timetable-delete', $day->id) }}" method="POST">
                @csrf 
                @method('DELETE')
                <input type="submit" value="DELETE" class="del-btn">
            </form>
        </span>
    </div>
</td>