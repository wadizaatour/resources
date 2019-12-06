@for($i=0; $i<5; ++$i)
@if($i < $rating)
    <i class="fa fa-star" aria-hidden="true"></i>
@else
    <i class="fa fa-star-o" aria-hidden="true"></i>
@endif
@endfor
