                        <div class="grid-x grid-padding-x">
                          <div class="small-6 cell">
                            <span id="captcha-img-{{ $id }}"><img src="{!! $captcha[$id]->getImageSrcTag($id) !!}" /></span>{{-- parameter use not really optimized, but works for now --}}
                          </div>
                          <div class="small-2 cell">
                            <a href="#" id="captcha-gen-{{ $id }}" class="button" title="Refresh verification image"><i class="icon-reload"></i></a>
                          </div>
                          <div class="small-4 cell">
                            <input type="text" name="{{ $id }}_captcha" class="input-group-field{{ $errors->has($id.'_captcha') ? ' is-invalid-input' : '' }}" placeholder="Image text" autocomplete="off" required="required" />
                          </div>
                        </div>
