   @php
       $data = DB::table('website_settings')
           ->select(['contact_mail', 'twitter', 'facebook', 'youtube', 'instagram'])
           ->first();
   @endphp

   @if (!collect($data)->filter()->isEmpty())
       <div class="social-contact col-md-5 clearfix">
           <span>لنكُن على تواصل</span>
           <ul class="clearfix" style="list-style: none">
               @if (isset($data->contact_mail))
                   <li><a id="email" class="social-icon email tool-tip" href="https://mailto:{{ $data->contact_mail }}"
                           title="اتصل بنا" target="_top"></a></li>
               @endif
               @if (isset($data->twitter))
                   <li><a id="twitter" class="social-icon twitter tool-tip" href="{{ $data->twitter }}"
                           title="{{ config('app.name') }} على تويتر" target="_blank"></a></li>
               @endif
               @if (isset($data->facebook))
                   <li><a id="facebook" class="social-icon facebook tool-tip" href="{{ $data->facebook }}"
                           title="{{ config('app.name') }} على فيسبوك" target="_blank"></a></li>
               @endif
               @if (isset($data->youtube))
                   <li><a id="youtube" class="social-icon youtube tool-tip" href="{{ $data->youtube }}"
                           title="{{ config('app.name') }} على يوتيوب" target="_blank"></a></li>
               @endif
               @if (isset($data->instagram))
                   <li><a id="instagram" class="social-icon instagram tool-tip" href="{{ $data->instagram }}"
                           title="{{ config('app.name') }} على إنستجرام" target="_blank"></a></li>
               @endif

           </ul>
       </div>
   @endif
