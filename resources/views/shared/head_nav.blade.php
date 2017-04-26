<div class="navbar navbar-fixed-top navbar-default" role="navigation">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

        <span class="icon-bar"/>

      </button>

      <a href="#" class = "navbar-brand">ATRahayu</a>

    </div>

    <div class="collapse navbar-collapse">

    <ul class="nav navbar-nav navbar-right">
	

	<li>{!! link_to(route('root'), "Home") !!}</li>

	<li>{!! link_to(route('articles.index'), "Article") !!}</li>
	
	<li>{!! link_to(route('maatweb'), "Import and Export") !!}</li>

    </ul>

    </div>

  </div>

</div>