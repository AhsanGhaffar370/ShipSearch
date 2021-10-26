<style>
    .button5 {border-radius: 35%;font-size: 13px;color: white;background-color:#4d998d;}
    .button5:hover{color: white}
</style>
<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        {{-- <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label> --}}
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled'>
            
            {{-- <span class="fas fa-paper-plane"></span> --}}
            {{-- <i class="fad fa-paper-plane"></i> --}}
            <span class="btn button5 p-2 mx-3">Send</span>
        </button>
    </form>
</div>