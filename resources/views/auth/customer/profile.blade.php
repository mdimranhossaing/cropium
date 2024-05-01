<h1>My Customer Profile</h1>

<p><b>Name : </b>{{auth('customer')->user()->name}}</p>
<p><b>Email : </b>{{auth('customer')->user()->email}}</p>

<form action="{{ route('customer.logout') }}" method="POST">
    @csrf
    <input type="submit" value="Logout">
</form>
