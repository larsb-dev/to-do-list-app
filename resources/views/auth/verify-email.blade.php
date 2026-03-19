<div class="bg-dark">
  <h1>Youre email first needs to be verified, before youc an access the site!</h1>

  <form action="{{ route('verification.send') }}" method="POST">
    @csrf
    @method('POST')

    <button>Resend Verification Email</button>
  </form>
</div>
