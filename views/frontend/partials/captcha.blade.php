<div class="row" data-turbolinks="false" style="border: 2px!important; border-color: #A5A5A5">
  <div class="column col-6 mt-3">
    <span id="captcha-img-{{ $id }}"><img src="{!! $captcha[$id]->getImageSrcTag($id) !!}" alt="Verification"/></span>{{-- parameter use not really optimized, but works for now --}}
  </div>
<div class="row col-6 mt-3">
  <div class="col-4">
    <a href="#" id="captcha-gen-{{ $id }}" class="btn refresh-image" style="" title="Refresh verification image">
    </a>
  </div>
  <div class="col-8 mt-2">
    <input type="text" name="{{ $id }}_captcha"
           class="{{ $errors->has($id.'_captcha') ? ' is-invalid-input' : '' }}"
           placeholder="Voer de tekst in" autocomplete="off" required="required"/>
  </div>
</div>
</div>
