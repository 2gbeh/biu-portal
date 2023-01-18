@php
$chatbot_menu = $chatbot_menu ?? [];
@endphp

<script type="text/javascript">
    $(() => {
        $(".chatbot-fab").animate({
            right: '25px'
        }, "slow");
    });

    // $(window).scroll(() => {
    //     if (myDiv.offsetHeight + myDiv.scrollTop >= myDiv.scrollHeight) {
    //         scrolledToBottom(e);
    //     }
    // });

    const handleChatbotFab = () => {
        $('.chatbot-flag').toggle('fast');
    };

    const handleChatbotFabHide = () => {
        $('.chatbot').hide();
    };
</script>

<div class="chatbot">
    <section class="chatbot-flag" id="top-right">
        <p>Hello I'm <b>Amaka</b>, your virtual personal assistant.</p>

        <div class="chatbot-flag-nav">
            <a href="#!" title="Prev">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            <a href="#!" title="Next">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </section>

    <section class="chatbot-fab">
        <a href="#!" title="Amaka" onclick="handleChatbotFab()" ondblclick="handleChatbotFabHide()"
            style="background-image:url({{ asset('images/amaka.png') }});">
            &nbsp;
        </a>
    </section>
</div>
