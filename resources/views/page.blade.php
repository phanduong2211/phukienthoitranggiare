@extends("masterpage")
@section("miss")
<section class="main-content-section">
	<div class="container">
		<?php echo $pages[0]->content; ?>
	</div>
</section>
@stop