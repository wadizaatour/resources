<footer class="footer font-small stylish-color-dark pt-4 footer-bg-color">
  <div class="container">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="d-lg-flex justify-content-lg-between d-md-flex justify-content-md-between">
          <div class="col-lg-4 col-md-5">
            <img src="{{ asset('images/footer/AOS-logo_wit.png') }}" alt="{{ config('app.name') }}" style="width:90%" />
            <div class="row footer-fb-position logo-footer footer-fb-mobile-only">
              <br /><br />
              <h6 id="fbLbl" class="font-montserrat-regular">@lang('labels.frontend.titles.followUs')</h6>
              <img src="{{ asset('images/footer/FB_Logo.svg') }}" alt="Follow us" class="fbLogo" />
            </div>
            <br />
          </div>
          <div class="col-md-2 ml-lg-4">
            <ul class="list-group font-montserrat-regular">
              <li class="ml-lg-4 w-120-lg">
                <a href="{{ route('account.register', [], false) }}">@lang('labels.frontend.titles.createCompanyAcc')</a>
              </li>
              <li class="ml-lg-4"><a href="{{ route('frontend.contact', [], false) }}">@lang('labels.frontend.titles.demo')</a></li>
              <li class="ml-lg-4"><a href="{{ route('frontend.privacy', [], false) }}">@lang('labels.frontend.titles.privacy')</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <br /><br />
    <hr />
  </div>
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-lg-3 mx-auto">
        <h5 class="text-uppercase mt-3 mb-4 font-montserrat">@lang('labels.frontend.titles.selectBrand')</h5>
      </div>
@foreach(array_chunk(array_splice($footer_makes, 0, 64), 16, true) as $chunk)
      <div class="col-lg col-md-2 d-flex flex-column m-4">
@foreach($chunk as $slug => $name)
        <a href="{{ route('frontend.catalog.make', $slug, false) }}" class="font-montserrat-regular" title="{{ $name }}">{{ $name }}</a>
@endforeach
      </div>
@endforeach
      <div class="d-flex align-items-end col-2 mb-3">
        <button class="btn btn-default font-s-14 blue-light-color download" onclick="brandsExpander()">@lang('labels.frontend.brands.more')</button>
      </div>
      <div id="myDIV" style="display: none">
        <div class="row ipad-links-position footer-links-position">
@foreach(array_chunk(array_splice($footer_makes, 0, 100), 20, true) as $chunk)
          <div class="col d-flex flex-column mt-2 ml-3 mb-2 mr-1">
@foreach($chunk as $slug => $name)
            <a href="{{ route('frontend.catalog.make', $slug, false) }}" class="font-montserrat-regular" title="{{ $name }}">{{ $name }}</a>
@endforeach
          </div>
@endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright links mobile-footer font-montserrat-regular">
    <div class="container">
      <div class="row mt-2 mb-2">
        <div class="col-lg-6 col-md-3 text-mobile-center copyright-position">
          <span class="fs-10 ps-mb-copyright">@lang('labels.frontend.titles.copyright')</span>
        </div>
        <div class="col-lg-6 col-md-6 copyright-menu desktop-only flipped-fotter-p">
          <ul class="footer-links font-montserrat-regular">
@if(config('cms.enabled'))
            <li><a class="footerLink" href="{{ route('frontend.cms.index', [], false) }}">@lang('labels.frontend.titles.cms')</a></li>
@endif
            <li><a class="footerLink" href="{{ route('frontend.contact', [], false) }}">@lang('labels.frontend.titles.contact')</a></li>
            <li><a class="footerLink" href="{{ route('frontend.disclaimer', [], false) }}">@lang('labels.frontend.titles.disclaimer')</a></li>
            <li><a class="footerLink" href="{{ route('frontend.privacy', [], false) }}">@lang('labels.frontend.titles.privacy')</a></li>
            <li><a class="footerLink" href="{{ route('frontend.cookies', [], false) }}">@lang('labels.frontend.titles.cookies')</a></li>
            <li><a class="footerLink" href="{{ route('frontend.conditions', [], false) }}">@lang('labels.frontend.titles.condition')</a></li>
            <li><a class="footerLink" href="{{ route('frontend.sitemap', [], false) }}">@lang('labels.frontend.titles.sitemap')</a></li>
            <li><a class="footerLink" id="about" href="{{ route('frontend.about', [], false) }}">@lang('labels.frontend.titles.about')</a></li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 ipad-none">
          <div class="row">
            <ul class="footer-links col-6 footer-mb-pos font-montserrat-regular">
@if(config('cms.enabled'))
              <li><a class="footerLink" href="{{ route('frontend.cms.index', [], false) }}">@lang('labels.frontend.titles.cms')</a></li>
@endif
              <li><a class="footerLink" href="{{ route('frontend.contact', [], false) }}">@lang('labels.frontend.titles.contact')</a></li>
              <li><a class="footerLink" href="{{ route('frontend.disclaimer', [], false) }}">@lang('labels.frontend.titles.disclaimer')</a></li>
              <li><a class="footerLink" href="{{ route('frontend.privacy', [], false) }}">@lang('labels.frontend.titles.privacy')</a></li>
              <li><a class="footerLink" href="{{ route('frontend.cookies', [], false) }}">@lang('labels.frontend.titles.cookies')</a></li>
            </ul>
            <ul class="footer-links col-6 footer-mb-pos-2 font-montserrat-regular">
              <li><a class="footerLink" href="{{ route('frontend.conditions', [], false) }}">@lang('labels.frontend.titles.condition')</a></li>
              <li><a class="footerLink" href="{{ route('frontend.sitemap', [], false) }}">@lang('labels.frontend.titles.sitemap')</a></li>
              <li><a class="footerLink" id="about" href="{{ route('frontend.about', [], false) }}">@lang('labels.frontend.titles.about')</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
