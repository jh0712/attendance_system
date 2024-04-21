{{-- Should include those css and js --}}
{{-- <link href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css')}}" rel="stylesheet" type="text/css"> --}}
{{-- <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/pages/lightbox.js')}}"></script>
 --}}
 @php
 $class = '';
 $target = '';
 if (
     substr( strrchr($value, '.'), 1) == 'jpg'
     || substr( strrchr($value, '.'), 1) == 'jpeg'
     || substr( strrchr($value, '.'), 1) == 'png'
 ) {
     $class = 'image-popup-vertical-fit';
 } elseif (substr( strrchr($value, '.'), 1)) {
     $target = 'target="_blank"';
 }

@endphp
<div class="form-group form_file_upload_review {{ isset($attributes['class'])?$attributes['class']:'' }}">
 @if ($label)
 <label id="label_{{ $name }}" for="{{ $name }}">
     {!! $label !!}
 </label>
 @endif
 <div class="input-group-append">
     @if(isset($value))
     <a
         class="btn btn-outline-secondary btn-icon-split filestyle waves-effect {{ $class }}"
         href="{{ $url }}"
         style="pointer-events:all;"
         title="{{ $value }}"
         {{$target}}
     >
         <div class="icon">
             <i class="far fa-eye"></i>
         </div>
         <span class="text">
             {{ $value }}
         </span>
     </a>
     @endif
 </div>
</div>