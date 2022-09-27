<!doctype html>
<html lang="en">

<head>
    <title>Table 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.q2AVU534B4.css">
    {{-- <script nonce="e48652f9-8544-4203-b970-6db0de58becc">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {};
                a.zarazData.executed = [];
                a.zaraz = {
                    deferred: [],
                    listeners: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.zaraz.init = () => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                    a.zarazData.x = Math.random();
                    a.zarazData.w = a.screen.width;
                    a.zarazData.h = a.screen.height;
                    a.zarazData.j = a.innerHeight;
                    a.zarazData.e = a.innerWidth;
                    a.zarazData.l = a.location.href;
                    a.zarazData.r = e.referrer;
                    a.zarazData.k = a.screen.colorDepth;
                    a.zarazData.n = e.characterSet;
                    a.zarazData.o = (new Date).getTimezoneOffset();
                    a.zarazData.q = [];
                    for (; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith(
                        "_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin";
                    z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                    t.parentNode.insertBefore(z, t)
                };
                ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);
    </script> --}}
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">Table #06</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h5 mb-4 text-center">Table Accordion</h3>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>&nbsp;</th>
                                    {{-- <th>images</th> --}}
                                    <th>Product</th>
                                    <th>Price</th>
                                    {{-- <th>Quantity</th>
                                    <th>total</th> --}}
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert" role="alert">
                                    <td>
                                        <label class="checkbox-wrap checkbox-primary">
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    {{-- <td>
                                        <div class="img" style="background-image:url(images/product-1.png)"></div>
                                    </td> --}}
                                    <td>
                                        <div class="email">
                                            <span>Sneakers Shoes 2020 For Men </span>
                                            <span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
                                        </div>
                                    </td>
                                    <td>$44.99</td>
                                    {{-- <td class="quantity">
                                        <div class="input-group">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="2" min="1"
                                                max="100">
                                        </div>
                                    </td>
                                    <td>$89.98</td> --}}
                                    <td>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="alert" role="alert">
                                    <td>
                                        <label class="checkbox-wrap checkbox-primary">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    {{-- <td>
                                        <div class="img" style="background-image:url(images/product-2.png)"></div>
                                    </td> --}}
                                    <td>
                                        <div class="email">
                                            <span>Sneakers Shoes 2020 For Men </span>
                                            <span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
                                        </div>
                                    </td>
                                    <td>$30.99</td>
                                    {{-- <td class="quantity">
                                        <div class="input-group">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1"
                                                max="100">
                                        </div>
                                    </td>
                                    <td>$30.99</td> --}}
                                    <td>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="alert" role="alert">
                                    <td class="border-bottom-0">
                                        <label class="checkbox-wrap checkbox-primary">
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    {{-- <td class="border-bottom-0">
                                        <div class="img" style="background-image:url(images/product-1.png)"></div>
                                    </td> --}}
                                    <td class="border-bottom-0">
                                        <div class="email">
                                            <span>Sneakers Shoes 2020 For Men </span>
                                            <span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">$40.00</td>
                                    {{-- <td class="quantity border-bottom-0">
                                        <div class="input-group">
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="1"
                                                min="1" max="100">
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">$40.00</td> --}}
                                    <td class="border-bottom-0">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"74e294a36ac67c55","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.1","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
