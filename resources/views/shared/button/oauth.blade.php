@php
switch ($button_oauth_isp) {
    case 'gmail':
        $button_oauth_url = 'https://accounts.google.com/v3/signin/identifier?dsh=S-871770954%3A1669109454434567&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&rip=1&sacu=1&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=ARgdvAuuoX5piFkX-NppQ1g-daVOeYygUe-4NQ4yTSSyq4gzaz9colwBJ2Zpt9ysMIZMnsH376Q3iw';
        $button_oauth_img = ['src' => 'svg/google_logo.svg', 'width' => '30px'];
        $button_oauth_txt = 'Sign in with Google';
        break;
    default:
        $button_oauth_url = 'https://oauth.net/';
        $button_oauth_img = ['src' => 'images/oauth.png', 'width' => '20px'];
        $button_oauth_txt = 'Sign in with OAuth';
}
@endphp

<script type="text/javascript">
    const handleButtonOauth = (this_) => {
        window.open(
            this_.dataset.url,
            'oauth',
            'toolbars=0,titlebar=0,width=480,height=480,left=200,top=200,scrollbars=1,resizable=0');
    };
</script>

<a onclick="handleButtonOauth(this)" class="{{ trans('tw.btn.oauth') }}" data-url="{{ $button_oauth_url }}">
    <img src="{{ asset($button_oauth_img['src']) }}" width="{{ $button_oauth_img['width'] }}" alt="" /> &nbsp;
    {{ $button_oauth_txt }}
</a>
