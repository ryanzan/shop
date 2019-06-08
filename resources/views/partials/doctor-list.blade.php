{{--<div class="row">--}}
{{--<form class="form-horizontal" id="doctor-search">--}}
    {{--<div class="col-md-9">--}}
    {{--<input type="text" name="doctor" placeholder="Enter Doctor Name"--}}
              {{--class="form-control form-input">--}}
{{--</div>--}}
{{--<div class="col-md-3">--}}
    {{--<button type="button" id="doctor-search" class="btn btn-primary">--}}
        {{--<i class="fa fa-search  fa-2x " aria-hidden="true"></i>--}}
    {{--</button>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
<h4>Doctors</h4>
<table class="table table-bordered table-responsive table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Full Name</th>
        <th>Qualification</th>
        <th>Speciality</th>
        <th>Hospital</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=0; ?>
    @foreach($doctors as $doctor)
        <?php $i++ ?>
        <tr>
            <td>{{$i}}</td>
            <td>{{@$doctor->first_name.' '. @$doctor->last_name}}</td>
            <td>{{@$doctor->qualification}}</td>
            <td><a href="#" id="spec"> {{@$doctor->specialist->name}}</a></td>
            <td>
                @foreach($doctor->hospital as $item)
                    {{@$item->name}}
                    @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! @$doctors->links() !!}

