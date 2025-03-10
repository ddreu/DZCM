/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-canvas-checked-csscalc-csschunit-csscolumns-cssescape-cssexunit-cssfilters-cssresize-cssscrollbar-csstransitions-cssvalid-cssvhunit-cssvmaxunit-cssvminunit-cssvwunit-cubicbezierrange-display_runin-displaytable-ellipsis-flexbox-preserve3d-rgba-scrollsnappoints-shapes-supports-target-textalignlast-textshadow-userselect-addtest-atrule-domprefixes-hasevent-mq-prefixed-prefixedcss-prefixedcssvalue-prefixes-printshiv-setclasses-testallprops-testprop-teststyles !*/
 !function(e, t, n) {
    function r(e, t) {
        return typeof e === t
    }
    function i() {
        var e, t, n, i, o, a, s;
        for (var l in S)
            if (S.hasOwnProperty(l)) {
                if (e = [],
                t = S[l],
                t.name && (e.push(t.name.toLowerCase()),
                t.options && t.options.aliases && t.options.aliases.length))
                    for (n = 0; n < t.options.aliases.length; n++)
                        e.push(t.options.aliases[n].toLowerCase());
                for (i = r(t.fn, "function") ? t.fn() : t.fn,
                o = 0; o < e.length; o++)
                    a = e[o],
                    s = a.split("."),
                    1 === s.length ? Modernizr[s[0]] = i : (!Modernizr[s[0]] || Modernizr[s[0]]instanceof Boolean || (Modernizr[s[0]] = new Boolean(Modernizr[s[0]])),
                    Modernizr[s[0]][s[1]] = i),
                    b.push((i ? "" : "no-") + s.join("-"))
            }
    }
    function o(e) {
        var t = _.className
          , n = Modernizr._config.classPrefix || "";
        if (N && (t = t.baseVal),
        Modernizr._config.enableJSClass) {
            var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
            t = t.replace(r, "$1" + n + "js$2")
        }
        Modernizr._config.enableClasses && (t += " " + n + e.join(" " + n),
        N ? _.className.baseVal = t : _.className = t)
    }
    function a(e, t) {
        if ("object" == typeof e)
            for (var n in e)
                A(e, n) && a(n, e[n]);
        else {
            e = e.toLowerCase();
            var r = e.split(".")
              , i = Modernizr[r[0]];
            if (2 == r.length && (i = i[r[1]]),
            "undefined" != typeof i)
                return Modernizr;
            t = "function" == typeof t ? t() : t,
            1 == r.length ? Modernizr[r[0]] = t : (!Modernizr[r[0]] || Modernizr[r[0]]instanceof Boolean || (Modernizr[r[0]] = new Boolean(Modernizr[r[0]])),
            Modernizr[r[0]][r[1]] = t),
            o([(t && 0 != t ? "" : "no-") + r.join("-")]),
            Modernizr._trigger(e, t)
        }
        return Modernizr
    }
    function s() {
        return "function" != typeof t.createElement ? t.createElement(arguments[0]) : N ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments)
    }
    function l(e) {
        return e.replace(/([a-z])-([a-z])/g, function(e, t, n) {
            return t + n.toUpperCase()
        }).replace(/^-/, "")
    }
    function d(e) {
        return e.replace(/([A-Z])/g, function(e, t) {
            return "-" + t.toLowerCase()
        }).replace(/^ms-/, "-ms-")
    }
    function u(e, t) {
        return e - 1 === t || e === t || e + 1 === t
    }
    function c() {
        var e = t.body;
        return e || (e = s(N ? "svg" : "body"),
        e.fake = !0),
        e
    }
    function f(e, n, r, i) {
        var o, a, l, d, u = "modernizr", f = s("div"), p = c();
        if (parseInt(r, 10))
            for (; r--; )
                l = s("div"),
                l.id = i ? i[r] : u + (r + 1),
                f.appendChild(l);
        return o = s("style"),
        o.type = "text/css",
        o.id = "s" + u,
        (p.fake ? p : f).appendChild(o),
        p.appendChild(f),
        o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(t.createTextNode(e)),
        f.id = u,
        p.fake && (p.style.background = "",
        p.style.overflow = "hidden",
        d = _.style.overflow,
        _.style.overflow = "hidden",
        _.appendChild(p)),
        a = n(f, e),
        p.fake ? (p.parentNode.removeChild(p),
        _.style.overflow = d,
        _.offsetHeight) : f.parentNode.removeChild(f),
        !!a
    }
    function p(e, t) {
        return !!~("" + e).indexOf(t)
    }
    function h(t, r) {
        var i = t.length;
        if ("CSS"in e && "supports"in e.CSS) {
            for (; i--; )
                if (e.CSS.supports(d(t[i]), r))
                    return !0;
            return !1
        }
        if ("CSSSupportsRule"in e) {
            for (var o = []; i--; )
                o.push("(" + d(t[i]) + ":" + r + ")");
            return o = o.join(" or "),
            f("@supports (" + o + ") { #modernizr { position: absolute; } }", function(e) {
                return "absolute" == getComputedStyle(e, null).position
            })
        }
        return n
    }
    function m(e, t, i, o) {
        function a() {
            u && (delete R.style,
            delete R.modElem)
        }
        if (o = r(o, "undefined") ? !1 : o,
        !r(i, "undefined")) {
            var d = h(e, i);
            if (!r(d, "undefined"))
                return d
        }
        for (var u, c, f, m, v, g = ["modernizr", "tspan", "samp"]; !R.style && g.length; )
            u = !0,
            R.modElem = s(g.shift()),
            R.style = R.modElem.style;
        for (f = e.length,
        c = 0; f > c; c++)
            if (m = e[c],
            v = R.style[m],
            p(m, "-") && (m = l(m)),
            R.style[m] !== n) {
                if (o || r(i, "undefined"))
                    return a(),
                    "pfx" == t ? m : !0;
                try {
                    R.style[m] = i
                } catch (y) {}
                if (R.style[m] != v)
                    return a(),
                    "pfx" == t ? m : !0
            }
        return a(),
        !1
    }
    function v(e, t) {
        return function() {
            return e.apply(t, arguments)
        }
    }
    function g(e, t, n) {
        var i;
        for (var o in e)
            if (e[o]in t)
                return n === !1 ? e[o] : (i = t[e[o]],
                r(i, "function") ? v(i, n || t) : i);
        return !1
    }
    function y(e, t, n, i, o) {
        var a = e.charAt(0).toUpperCase() + e.slice(1)
          , s = (e + " " + L.join(a + " ") + a).split(" ");
        return r(t, "string") || r(t, "undefined") ? m(s, t, i, o) : (s = (e + " " + j.join(a + " ") + a).split(" "),
        g(s, t, n))
    }
    function x(e, t, r) {
        return y(e, n, n, t, r)
    }
    var b = []
      , S = []
      , C = {
        _version: "3.3.1",
        _config: {
            classPrefix: "",
            enableClasses: !0,
            enableJSClass: !0,
            usePrefixes: !0
        },
        _q: [],
        on: function(e, t) {
            var n = this;
            setTimeout(function() {
                t(n[e])
            }, 0)
        },
        addTest: function(e, t, n) {
            S.push({
                name: e,
                fn: t,
                options: n
            })
        },
        addAsyncTest: function(e) {
            S.push({
                name: null,
                fn: e
            })
        }
    }
      , Modernizr = function() {};
    Modernizr.prototype = C,
    Modernizr = new Modernizr;
    var T = e.CSS;
    Modernizr.addTest("cssescape", T ? "function" == typeof T.escape : !1);
    var w = "CSS"in e && "supports"in e.CSS
      , E = "supportsCSS"in e;
    Modernizr.addTest("supports", w || E);
    var z = C._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
    C._prefixes = z;
    var _ = t.documentElement
      , N = "svg" === _.nodeName.toLowerCase();
    N || !function(e, t) {
        function n(e, t) {
            var n = e.createElement("p")
              , r = e.getElementsByTagName("head")[0] || e.documentElement;
            return n.innerHTML = "x<style>" + t + "</style>",
            r.insertBefore(n.lastChild, r.firstChild)
        }
        function r() {
            var e = w.elements;
            return "string" == typeof e ? e.split(" ") : e
        }
        function i(e, t) {
            var n = w.elements;
            "string" != typeof n && (n = n.join(" ")),
            "string" != typeof e && (e = e.join(" ")),
            w.elements = n + " " + e,
            d(t)
        }
        function o(e) {
            var t = T[e[S]];
            return t || (t = {},
            C++,
            e[S] = C,
            T[C] = t),
            t
        }
        function a(e, n, r) {
            if (n || (n = t),
            v)
                return n.createElement(e);
            r || (r = o(n));
            var i;
            return i = r.cache[e] ? r.cache[e].cloneNode() : b.test(e) ? (r.cache[e] = r.createElem(e)).cloneNode() : r.createElem(e),
            !i.canHaveChildren || x.test(e) || i.tagUrn ? i : r.frag.appendChild(i)
        }
        function s(e, n) {
            if (e || (e = t),
            v)
                return e.createDocumentFragment();
            n = n || o(e);
            for (var i = n.frag.cloneNode(), a = 0, s = r(), l = s.length; l > a; a++)
                i.createElement(s[a]);
            return i
        }
        function l(e, t) {
            t.cache || (t.cache = {},
            t.createElem = e.createElement,
            t.createFrag = e.createDocumentFragment,
            t.frag = t.createFrag()),
            e.createElement = function(n) {
                return w.shivMethods ? a(n, e, t) : t.createElem(n)
            }
            ,
            e.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + r().join().replace(/[\w\-:]+/g, function(e) {
                return t.createElem(e),
                t.frag.createElement(e),
                'c("' + e + '")'
            }) + ");return n}")(w, t.frag)
        }
        function d(e) {
            e || (e = t);
            var r = o(e);
            return !w.shivCSS || m || r.hasCSS || (r.hasCSS = !!n(e, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),
            v || l(e, r),
            e
        }
        function u(e) {
            for (var t, n = e.getElementsByTagName("*"), i = n.length, o = RegExp("^(?:" + r().join("|") + ")$", "i"), a = []; i--; )
                t = n[i],
                o.test(t.nodeName) && a.push(t.applyElement(c(t)));
            return a
        }
        function c(e) {
            for (var t, n = e.attributes, r = n.length, i = e.ownerDocument.createElement(z + ":" + e.nodeName); r--; )
                t = n[r],
                t.specified && i.setAttribute(t.nodeName, t.nodeValue);
            return i.style.cssText = e.style.cssText,
            i
        }
        function f(e) {
            for (var t, n = e.split("{"), i = n.length, o = RegExp("(^|[\\s,>+~])(" + r().join("|") + ")(?=[[\\s,>+~#.:]|$)", "gi"), a = "$1" + z + "\\:$2"; i--; )
                t = n[i] = n[i].split("}"),
                t[t.length - 1] = t[t.length - 1].replace(o, a),
                n[i] = t.join("}");
            return n.join("{")
        }
        function p(e) {
            for (var t = e.length; t--; )
                e[t].removeNode()
        }
        function h(e) {
            function t() {
                clearTimeout(a._removeSheetTimer),
                r && r.removeNode(!0),
                r = null
            }
            var r, i, a = o(e), s = e.namespaces, l = e.parentWindow;
            return !_ || e.printShived ? e : ("undefined" == typeof s[z] && s.add(z),
            l.attachEvent("onbeforeprint", function() {
                t();
                for (var o, a, s, l = e.styleSheets, d = [], c = l.length, p = Array(c); c--; )
                    p[c] = l[c];
                for (; s = p.pop(); )
                    if (!s.disabled && E.test(s.media)) {
                        try {
                            o = s.imports,
                            a = o.length
                        } catch (h) {
                            a = 0
                        }
                        for (c = 0; a > c; c++)
                            p.push(o[c]);
                        try {
                            d.push(s.cssText)
                        } catch (h) {}
                    }
                d = f(d.reverse().join("")),
                i = u(e),
                r = n(e, d)
            }),
            l.attachEvent("onafterprint", function() {
                p(i),
                clearTimeout(a._removeSheetTimer),
                a._removeSheetTimer = setTimeout(t, 500)
            }),
            e.printShived = !0,
            e)
        }
        var m, v, g = "3.7.3", y = e.html5 || {}, x = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i, b = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i, S = "_html5shiv", C = 0, T = {};
        !function() {
            try {
                var e = t.createElement("a");
                e.innerHTML = "<xyz></xyz>",
                m = "hidden"in e,
                v = 1 == e.childNodes.length || function() {
                    t.createElement("a");
                    var e = t.createDocumentFragment();
                    return "undefined" == typeof e.cloneNode || "undefined" == typeof e.createDocumentFragment || "undefined" == typeof e.createElement
                }()
            } catch (n) {
                m = !0,
                v = !0
            }
        }();
        var w = {
            elements: y.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
            version: g,
            shivCSS: y.shivCSS !== !1,
            supportsUnknownElements: v,
            shivMethods: y.shivMethods !== !1,
            type: "default",
            shivDocument: d,
            createElement: a,
            createDocumentFragment: s,
            addElements: i
        };
        e.html5 = w,
        d(t);
        var E = /^$|\b(?:all|print)\b/
          , z = "html5shiv"
          , _ = !v && function() {
            var n = t.documentElement;
            return !("undefined" == typeof t.namespaces || "undefined" == typeof t.parentWindow || "undefined" == typeof n.applyElement || "undefined" == typeof n.removeNode || "undefined" == typeof e.attachEvent)
        }();
        w.type += " print",
        w.shivPrint = h,
        h(t),
        "object" == typeof module && module.exports && (module.exports = w)
    }("undefined" != typeof e ? e : this, t);
    var k = "Moz O ms Webkit"
      , j = C._config.usePrefixes ? k.toLowerCase().split(" ") : [];
    C._domPrefixes = j;
    var A;
    !function() {
        var e = {}.hasOwnProperty;
        A = r(e, "undefined") || r(e.call, "undefined") ? function(e, t) {
            return t in e && r(e.constructor.prototype[t], "undefined")
        }
        : function(t, n) {
            return e.call(t, n)
        }
    }(),
    C._l = {},
    C.on = function(e, t) {
        this._l[e] || (this._l[e] = []),
        this._l[e].push(t),
        Modernizr.hasOwnProperty(e) && setTimeout(function() {
            Modernizr._trigger(e, Modernizr[e])
        }, 0)
    }
    ,
    C._trigger = function(e, t) {
        if (this._l[e]) {
            var n = this._l[e];
            setTimeout(function() {
                var e, r;
                for (e = 0; e < n.length; e++)
                    (r = n[e])(t)
            }, 0),
            delete this._l[e]
        }
    }
    ,
    Modernizr._q.push(function() {
        C.addTest = a
    });
    var L = C._config.usePrefixes ? k.split(" ") : [];
    C._cssomPrefixes = L;
    var M = function(t) {
        var r, i = z.length, o = e.CSSRule;
        if ("undefined" == typeof o)
            return n;
        if (!t)
            return !1;
        if (t = t.replace(/^@/, ""),
        r = t.replace(/-/g, "_").toUpperCase() + "_RULE",
        r in o)
            return "@" + t;
        for (var a = 0; i > a; a++) {
            var s = z[a]
              , l = s.toUpperCase() + "_" + r;
            if (l in o)
                return "@-" + s.toLowerCase() + "-" + t
        }
        return !1
    };
    C.atRule = M;
    var P = function() {
        function e(e, t) {
            var i;
            return e ? (t && "string" != typeof t || (t = s(t || "div")),
            e = "on" + e,
            i = e in t,
            !i && r && (t.setAttribute || (t = s("div")),
            t.setAttribute(e, ""),
            i = "function" == typeof t[e],
            t[e] !== n && (t[e] = n),
            t.removeAttribute(e)),
            i) : !1
        }
        var r = !("onblur"in t.documentElement);
        return e
    }();
    C.hasEvent = P;
    var B = function(e, t) {
        var n = !1
          , r = s("div")
          , i = r.style;
        if (e in i) {
            var o = j.length;
            for (i[e] = t,
            n = i[e]; o-- && !n; )
                i[e] = "-" + j[o] + "-" + t,
                n = i[e]
        }
        return "" === n && (n = !1),
        n
    };
    C.prefixedCSSValue = B,
    Modernizr.addTest("canvas", function() {
        var e = s("canvas");
        return !(!e.getContext || !e.getContext("2d"))
    }),
    Modernizr.addTest("csscalc", function() {
        var e = "width:"
          , t = "calc(10px);"
          , n = s("a");
        return n.style.cssText = e + z.join(t + e),
        !!n.style.length
    }),
    Modernizr.addTest("cubicbezierrange", function() {
        var e = s("a");
        return e.style.cssText = z.join("transition-timing-function:cubic-bezier(1,0,0,1.1); "),
        !!e.style.length
    }),
    Modernizr.addTest("rgba", function() {
        var e = s("a").style;
        return e.cssText = "background-color:rgba(150,255,150,.5)",
        ("" + e.backgroundColor).indexOf("rgba") > -1
    }),
    Modernizr.addTest("preserve3d", function() {
        var e = s("a")
          , t = s("a");
        e.style.cssText = "display: block; transform-style: preserve-3d; transform-origin: right; transform: rotateY(40deg);",
        t.style.cssText = "display: block; width: 9px; height: 1px; background: #000; transform-origin: right; transform: rotateY(40deg);",
        e.appendChild(t),
        _.appendChild(e);
        var n = t.getBoundingClientRect();
        return _.removeChild(e),
        n.width && n.width < 4
    });
    var W = {
        elem: s("modernizr")
    };
    Modernizr._q.push(function() {
        delete W.elem
    }),
    Modernizr.addTest("csschunit", function() {
        var e, t = W.elem.style;
        try {
            t.fontSize = "3ch",
            e = -1 !== t.fontSize.indexOf("ch")
        } catch (n) {
            e = !1
        }
        return e
    }),
    Modernizr.addTest("cssexunit", function() {
        var e, t = W.elem.style;
        try {
            t.fontSize = "3ex",
            e = -1 !== t.fontSize.indexOf("ex")
        } catch (n) {
            e = !1
        }
        return e
    });
    var I = function() {
        var t = e.matchMedia || e.msMatchMedia;
        return t ? function(e) {
            var n = t(e);
            return n && n.matches || !1
        }
        : function(t) {
            var n = !1;
            return f("@media " + t + " { #modernizr { position: absolute; } }", function(t) {
                n = "absolute" == (e.getComputedStyle ? e.getComputedStyle(t, null) : t.currentStyle).position
            }),
            n
        }
    }();
    C.mq = I;
    var O = C.testStyles = f;
    Modernizr.addTest("checked", function() {
        return O("#modernizr {position:absolute} #modernizr input {margin-left:10px} #modernizr :checked {margin-left:20px;display:block}", function(e) {
            var t = s("input");
            return t.setAttribute("type", "checkbox"),
            t.setAttribute("checked", "checked"),
            e.appendChild(t),
            20 === t.offsetLeft
        })
    }),
    O("#modernizr{display: table; direction: ltr}#modernizr div{display: table-cell; padding: 10px}", function(e) {
        var t, n = e.childNodes;
        t = n[0].offsetLeft < n[1].offsetLeft,
        Modernizr.addTest("displaytable", t, {
            aliases: ["display-table"]
        })
    }, 2),
    Modernizr.addTest("cssvalid", function() {
        return O("#modernizr input{height:0;border:0;padding:0;margin:0;width:10px} #modernizr input:valid{width:50px}", function(e) {
            var t = s("input");
            return e.appendChild(t),
            t.clientWidth > 10
        })
    }),
    O("#modernizr { height: 50vh; }", function(t) {
        var n = parseInt(e.innerHeight / 2, 10)
          , r = parseInt((e.getComputedStyle ? getComputedStyle(t, null) : t.currentStyle).height, 10);
        Modernizr.addTest("cssvhunit", r == n)
    }),
    O("#modernizr1{width: 50vmax}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}", function(t) {
        var n = t.childNodes[2]
          , r = t.childNodes[1]
          , i = t.childNodes[0]
          , o = parseInt((r.offsetWidth - r.clientWidth) / 2, 10)
          , a = i.clientWidth / 100
          , s = i.clientHeight / 100
          , l = parseInt(50 * Math.max(a, s), 10)
          , d = parseInt((e.getComputedStyle ? getComputedStyle(n, null) : n.currentStyle).width, 10);
        Modernizr.addTest("cssvmaxunit", u(l, d) || u(l, d - o))
    }, 3),
    O("#modernizr1{width: 50vm;width:50vmin}#modernizr2{width:50px;height:50px;overflow:scroll}#modernizr3{position:fixed;top:0;left:0;bottom:0;right:0}", function(t) {
        var n = t.childNodes[2]
          , r = t.childNodes[1]
          , i = t.childNodes[0]
          , o = parseInt((r.offsetWidth - r.clientWidth) / 2, 10)
          , a = i.clientWidth / 100
          , s = i.clientHeight / 100
          , l = parseInt(50 * Math.min(a, s), 10)
          , d = parseInt((e.getComputedStyle ? getComputedStyle(n, null) : n.currentStyle).width, 10);
        Modernizr.addTest("cssvminunit", u(l, d) || u(l, d - o))
    }, 3),
    O("#modernizr { width: 50vw; }", function(t) {
        var n = parseInt(e.innerWidth / 2, 10)
          , r = parseInt((e.getComputedStyle ? getComputedStyle(t, null) : t.currentStyle).width, 10);
        Modernizr.addTest("cssvwunit", r == n)
    });
    var R = {
        style: W.elem.style
    };
    Modernizr._q.unshift(function() {
        delete R.style
    });
    var F = C.testProp = function(e, t, r) {
        return m([e], n, t, r)
    }
    ;
    Modernizr.addTest("textshadow", F("textShadow", "1px 1px")),
    O("#modernizr{overflow: scroll; width: 40px; height: 40px; }#" + z.join("scrollbar{width:0px} #modernizr::").split("#").slice(1).join("#") + "scrollbar{width:0px}", function(e) {
        Modernizr.addTest("cssscrollbar", 40 == e.scrollWidth)
    }),
    C.testAllProps = y;
    var q = C.prefixed = function(e, t, n) {
        return 0 === e.indexOf("@") ? M(e) : (-1 != e.indexOf("-") && (e = l(e)),
        t ? y(e, t, n) : y(e, "pfx"))
    }
    ;
    C.prefixedCSS = function(e) {
        var t = q(e);
        return t && d(t)
    }
    ;
    C.testAllProps = x,
    function() {
        Modernizr.addTest("csscolumns", function() {
            var e = !1
              , t = x("columnCount");
            try {
                (e = !!t) && (e = new Boolean(e))
            } catch (n) {}
            return e
        });
        for (var e, t, n = ["Width", "Span", "Fill", "Gap", "Rule", "RuleColor", "RuleStyle", "RuleWidth", "BreakBefore", "BreakAfter", "BreakInside"], r = 0; r < n.length; r++)
            e = n[r].toLowerCase(),
            t = x("column" + n[r]),
            ("breakbefore" === e || "breakafter" === e || "breakinside" == e) && (t = t || x(n[r])),
            Modernizr.addTest("csscolumns." + e, t)
    }(),
    Modernizr.addTest("displayrunin", x("display", "run-in"), {
        aliases: ["display-runin"]
    }),
    Modernizr.addTest("ellipsis", x("textOverflow", "ellipsis")),
    Modernizr.addTest("cssfilters", function() {
        if (Modernizr.supports)
            return x("filter", "blur(2px)");
        var e = s("a");
        return e.style.cssText = z.join("filter:blur(2px); "),
        !!e.style.length && (t.documentMode === n || t.documentMode > 9)
    }),
    Modernizr.addTest("flexbox", x("flexBasis", "1px", !0)),
    Modernizr.addTest("cssresize", x("resize", "both", !0)),
    Modernizr.addTest("scrollsnappoints", x("scrollSnapType")),
    Modernizr.addTest("shapes", x("shapeOutside", "content-box", !0)),
    Modernizr.addTest("textalignlast", x("textAlignLast")),
    Modernizr.addTest("csstransitions", x("transition", "all", !0)),
    Modernizr.addTest("userselect", x("userSelect", "none", !0)),
    Modernizr.addTest("target", function() {
        var t = e.document;
        if (!("querySelectorAll"in t))
            return !1;
        try {
            return t.querySelectorAll(":target"),
            !0
        } catch (n) {
            return !1
        }
    }),
    i(),
    o(b),
    delete C.addTest,
    delete C.addAsyncTest;
    for (var $ = 0; $ < Modernizr._q.length; $++)
        Modernizr._q[$]();
    e.Modernizr = Modernizr
}(window, document);
