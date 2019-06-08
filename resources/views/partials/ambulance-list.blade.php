<h4>Ambulances</h4>
<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Contact</th>
        <th>Organization</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=0; ?>
    @foreach($ambulances as $key=>$value)
        <?php $i++ ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{$value}}</td>
            <td>{{$key}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
