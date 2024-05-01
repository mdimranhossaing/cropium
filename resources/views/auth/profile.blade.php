<h1>My Profile</h1>

<p><b>Name : </b>{{auth()->user()->name}}</p>
<p><b>Email : </b>{{auth()->user()->email}}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="Logout">
</form>
