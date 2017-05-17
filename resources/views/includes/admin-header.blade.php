<header>
	<nav class="navbar navbar-inverse" role="navigation" style="border-radius:0;">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Laravel Blog</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="navbar">
	      <ul class="nav navbar-nav">
	        <li {{ Request::is('admin') ? 'class=active' : '' }}><a href="{{ route('admin.index') }}">Dashboard</a></li>
		   <li {{ Request::is('admin/blog/post*') ? 'class=active' : '' }}><a href="{{ route('posts.show') }}">Posts</a></li>
		   <li {{ Request::is('admin/blog/categor*') ? 'class=active' : '' }}><a href="{{ route('cat') }}">Categories</a></li>
		   <li><a href="{{ Request::is('admin/cantact/*') ? 'class=active' : '' }}">Contact Messages</a></li>
	      </ul>
		 <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Logout</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</header>
