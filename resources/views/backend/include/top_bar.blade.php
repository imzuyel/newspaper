<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
           
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ Auth::user()->role->id==1? route('admin.index'):route('author.index') }}">AMAR SONGBAD</a>
        </div>
    </div>
</nav>
