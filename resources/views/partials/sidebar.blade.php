<div id="sidebar-wrapper" style="background-color: #e6ffff;">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
           <p>Quick Links</p>
        </li>
        <li>
            <a href="#">Hospitals List</a>
        </li>
        <li>
            <a href="/hospital/doctor">Doctors</a>
        </li>
        <li>
            <a href="/doctor/manage">Emergency Contact Numbers</a>
        </li>
        <li>
            <a href="#">Know about Diseases</a>
        </li>
        <li>
            <a href="#">Ambulances</a>
        </li>
        <li>
            <a href="#">News</a>
        </li>
        <li>
            <a href="#">Login for Hospitals</a>
        </li>
    </ul>
</div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>