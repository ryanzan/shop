<div class="col-lg-6">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="designation">Designation</label>
        <select class="form-control" name="specialist_id">
            <option value="">--Select Designation--</option>
            @foreach(@$specialists as $specialist)
                <option value="{{$specialist->id}}">{{$specialist->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="from">Time</label>
        <div class="col-md-12" style="margin-left:-30px;">
            <div class="col-md-6">
                <input type="text" name="to" class="form-control" placeholder="From">
            </div>
            <div class="col-md-6">
                <input type="text" name="from" class="form-control" placeholder="To">
            </div>
        </div>

    </div>
    <br>
    <div class="form-group">
        <label for="qualification">Qualifications</label>
        <input type="text" name="qualification" class="form-control">
    </div>

</div>
<div class="col-lg-6">
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="reg_numb">NMC Number</label>
        <input type="text" name="nmc_no" class="form-control">
    </div>
    <div class="form-group">
        <label for="days">Available Days</label>
        <input type="text" name="days" class="form-control">
    </div>

</div>
