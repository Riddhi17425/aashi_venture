{{--
    Reusable round arrow badge used inside buttons / cards.
    Usage:  @include('front.partials.arrow-circle')
            @include('front.partials.arrow-circle', ['variant' => 'invert'])
    variant "invert" = white circle + blue arrow (for use on solid blue buttons)
    default          = blue circle + white arrow (for use on light / outline buttons)
--}}
<span class="arrow-circle {{ ($variant ?? '') === 'invert' ? 'arrow-circle--invert' : '' }} {{ $class ?? '' }}" aria-hidden="true">
    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 12h13M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</span>
