<h4>Hospitals</h4>
<table class="table table-bordered table-responsive table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Hospital Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>No. of Bed</th>
            <th>No. of Doctors</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=0; ?>
        @foreach($hospitals as $hospital)
        <?php $i++ ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{@$hospital->name}}</td>
                <td>{{@$hospital->address}}</td>
                <td>{{@$hospital->contact_no}}</td>
                <td>{{@$hospital->beds_no}}</td>
                <td>{{@$hospital->doctor->count()}}</td>
                <td><a href="/hospital/{{@$hospital->id}}"> <i class="fa fa-search " aria-hidden="true"></i></a> </td>
            </tr>
            @endforeach
    </tbody>
</table>
{!! @$hospitals->links() !!}