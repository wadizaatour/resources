@extends('layouts.frontend')

@section('content')


<div class="row">
	<div class="col-md-12">
		<h2>@lang('labels.frontend.titles.details')</h2>
	</div>
</div>

<div class="row pt-2 pb-5">

	<div class="col-md-7">

		<div class="row pt-3">
			<div class="col">
				<p class="m-0">@lang('labels.frontend.titles.carBrand'): Renault</p>
			</div>

		</div>
		<div class="row">
			<div class="col">
				<p class="m-0">@lang('labels.frontend.titles.model'): Clio</p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="m-0">@lang('forms.request.performance'): Estate</p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="m-0">@lang('forms.request.constructionYear'): 2018</p>
			</div>
		</div>
		<div class="row pt-5">
			<div class="col">
				<p class="m-0">@lang('labels.frontend.request.additionalComment')</p>
			</div>
		</div>
		<div class="row">
			<div class="col pt-4">
				<p class="m-0">@lang('labels.frontend.request.additionalCommentText')</p>
			</div>
		</div>

	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<img src="https:/via.placeholder.com/300" class="img-fluid">
			</div>
		</div>
		<div class="row pt-4">
			<div class="col-md-4">
				<img src="https:/via.placeholder.com/100" class="img-fluid">
			</div>
			<div class="col-md-4">
				<img src="https:/via.placeholder.com/100" class="img-fluid">
			</div>
		</div>
	</div>
</div>
<div class="row pt-2 pb-5">
	<div class="col-md-7 offset-md-5">
		<div class="row">
			<div class="col">
				<button class="btn btn-primary blueButton">@lang('labels.frontend.request.haveThisPart')</button>
			</div>
			<div class="col">
				<button class="btn btn-primary redButton">@lang('labels.frontend.request.dontHaveThisPart')</button>
			</div>

		</div>
	</div>

</div>
<div class="row pt-2 pb-5">
	<div class="col-md-4">
		<div>
			<button class="btn btn-primary greenButton">@lang('labels.frontend.request.partsSold')</button>
		</div>
		<div class="pt-4">
			<div class="custom-control custom-checkbox mr-sm-2">
				<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
				<label class="custom-control-label"
					for="customControlAutosizing">@lang('labels.frontend.request.bumperRed')</label>
			</div>
		</div>
		<div class="pt-2">
			<div class="custom-control custom-checkbox mr-sm-2">
				<input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
				<label class="custom-control-label"
					for="customControlAutosizing1">@lang('labels.frontend.request.shockAbsorber')</label>
			</div>
		</div>
		<div class="pt-2">
			<div class="custom-control custom-checkbox mr-sm-2">
				<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
				<label class="custom-control-label"
					for="customControlAutosizing2">@lang('labels.frontend.request.directionIndicator')</label>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<p>
			@lang('labels.frontend.request.description')

		</p>
	</div>
</div>
<div class="row pt-2 pb-5">
	<div class="col-md-5">
		<button class="btn btn-primary blueButton">€ @lang('labels.frontend.request.totalAmount')</button>
	</div>
</div>

</div>
@endsection