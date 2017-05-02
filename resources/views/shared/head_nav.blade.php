<div class="navbar navbar-fixed-top navbar-default" role="navigation">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

      </button>

      <a href="#" class = "navbar-brand">LEARNED LARAVEL 5</a>

    </div>

    <div class="collapse navbar-collapse">

    <ul class="nav navbar-nav navbar-right">
	
	<li>{!! link_to(route('root'), "Home") !!}</li>
	
	<li>{!! link_to(route('profile'), "Profile") !!}</li>
	
	<li>{!! link_to(route('articles.index'), "Article") !!}</li>
	
	<li>{!! link_to(route('maatweb'), "Import") !!}</li>
	
	@if (Sentinel::check())
		
    <li>{!! link_to(route('logout'), 'Logout') !!}</li>
	
    <li><a>Wellcome {!! Sentinel::getUser()->email !!}</a></li>
	
  @else
	  
    <li>{!! link_to(route('signup'), 'Signup') !!}</li>
    <li>{!! link_to(route('login'), 'Login') !!}</li>
	
  @endif
  
  

    </ul>

    </div>

  </div>

</div>