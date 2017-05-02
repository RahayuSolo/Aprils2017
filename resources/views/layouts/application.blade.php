<!DOCTYPE html>

  <html>

    <head>

      <meta charset="utf-8">

      <meta httpequiv="XUACompatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title >ATRahayu</title>

      <link href="/assets/css/bootstrap.css" rel="stylesheet" />

      <link href="/assets/css/material-design/bootstrap-material-design.css" rel="stylesheet" />

      <link href="/assets/css/material-design/ripples.css" rel="stylesheet" />

      <link href="/assets/css/custom/layout.css" rel="stylesheet" />
	  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/fontawesome/4.5.0/css/font-awesome.min.css">

    </head>

    <body style="padding-top:60px;">

      <!--bagian navigation-->

      @include('shared.head_nav')

      <!-- Bagian Content -->

      <div class="container clearfix">

        <div class="row row-offcanvas row-offcanvas-left ">

          <!--Bagian Kiri-->

          @include("shared.left_nav")


          <!--Bagian Kanan-->

          <div id="main-content" class="col-xs-12 col-sm-9 main pull-right">

            <div class="panel-body">

              @if (Session::has('error'))

                <div class="session-flash alert-danger">

                    {{Session::get('error')}}

                </div>

              @endif

              @if (Session::has('notice'))

                <div class="session-flash alert-info">

                    {{Session::get('notice')}}

                </div>

              @endif
			  
			 <div class="row">
				 <div class="form-group label-floating">
					<label class="col-lg-2" for="keywords">Search Article</label>

					<div class="col-lg-8">
					 <input type="text" class="form-control" id="keywords"
					placeholder="Type search keywords">
					 </div>

					 <div class="col-lg-2">
					 <button id="search" class="btn btn-info btn-flat"
					type="button">
					 Search
					 </button>
					 </div>

					 <div class="clear"></div>

				</div>
			</div>
			
			<br />
			<p>Sort articles by : <a id="id">ID &nbsp;<i id="icdirection"></i></a></p>
			<br />
			<div id="data-content">
			@yield("content")
			</div>
			<input id="direction" type="hidden" value="asc" />

            </div>

          </div>

        </div>

      </div>

      <script src="/assets/js/jquery/jquery-3.2.0.min.js"></script>

      <script src="/assets/js/bootstrap/bootstrap.js"></script>

      <script src="/assets/js/material-design/material.js"></script>

      <script src="/assets/js/material-design/ripples.js"></script>

      <script src="/assets/js/custom/layout.js"></script> 
	<script>
	$.material.init();
	$.material.checkbox();
	</script>
	<!-- Handle ajax link in header menu -->
	<script>
	$('#article_link').click(function(e){
		e.preventDefault();
		$.ajax({
		url:'/articles',
		type:"GET",
		dataType: "json",
		success: function (data)
		{
		$('#data-content').html(data['view']);
		},
		error: function (xhr, status)
		{
		console.log(xhr.error);
		}
		});
	});
	</script>

	<!-- This for handle ajax pagination -->
	<script>
	$(document).ready(function() {
		$(document).on('click', '.pagination a', function(e) {
		get_page($(this).attr('href').split('page=')[1]);
		e.preventDefault();
		});
	});

	function get_page(page) {
		$.ajax({
			url : '/articles?page=' + page,
			type : 'GET',
			dataType : 'json',
			data : {
				'keywords' : $('#keywords').val(),
				'direction' : $('#direction').val()
			}
			success : function(data) {
				$('#data-content').html(data['view']);
				$('#keywords').val(data['keywords']);
				$('#direction').val(data['direction']);
				},
				error : function(xhr, status, error) {
					console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
				},
			 complete : function() {
				 alreadyloading = false;
			 }
		 });
	}
	</script>
	
	<!-- This for handle ajax search -->
	<script>
	$('#search').on('click', function(){
		$.ajax({
			url : '/articles',
			type : 'GET',
			dataType : 'json',
			data : {
				'keywords' : $('#keywords').val(),
				'direction' : $('#direction').val()
			},
		 success : function(data) {
		 $('#data-content').html(data['view']);
		 $('#keywords').val(data['keywords']);
		 $('#direction').val(data['direction']);
		 },
		 error : function(xhr, status) {
		 console.log(xhr.error + " ERROR STATUS : " + status);
		 },
		 complete : function() {
		 alreadyloading = false;
		 }
		 });
		 });
		 </script>
		 <!-- this js for handle ajax sorting -->
		 <script>
		 $(document).ready(function() {
		 $(document).on('click', '#id', function(e) {
		 sort_articles();
		 e.preventDefault();
		 });
		 });
		 function sort_articles() {
		 $('#id').on('click', function() {
		 $.ajax({
		 url : '/articles',
		 typs : 'GET',
		 dataType : 'json',
		 data : {
		 'keywords' : $('#keywords').val(),
		 'direction' : $('#direction').val()
		 },
		 success : function(data) {
		 $('#data-content').html(data['view']);
		 $('#keywords').val(data['keywords']);
		 $('#direction').val(data['direction']);

		 if(data['direction'] == 'asc') {
		 $('i#ic-direction').attr({class: "fa fa-arrow-up"});
		 } else {
		 $('i#ic-direction').attr({class: "fa fa-arrow-down"});
		 }
		 },
		 error : function(xhr, status, error) {
		 console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" +
		error);
		 },
		 complete : function() {
		 alreadyloading = false;
		 }
		 });
		 });
		 }
		 </script>
    </body>

  </html>