class Main {
  constructor() {
    this.header = document.querySelector(".header");
    this.banner = document.querySelector(".join-banner");
    this.hero = new HeroSlider(".swiper");
    this.sides = document.querySelectorAll(".side");
    this._observers = [];
    this._init();
  }

  _init() {
    new MobileMenu();
    this._scrollInit();
  }

  destroy() {
    this._observers.forEach((so) => so.destroy());
  }

  _scrollInit() {
    this._observers.push(
      new ScrollObserver("#main-content", this._sideAnimation.bind(this), {
        once: false,
        rootMargin: "-300px 0px",
      }),
      new ScrollObserver(".nav-trigger", this._navAnimation.bind(this), {
        once: false,
      }),
      new ScrollObserver(".nav-trigger", this._navBanner.bind(this), {
        once: false,
      }),
      new ScrollObserver(".swiper", this._toggleSlideAnimation.bind(this), {
        once: false,
      }),
      new ScrollObserver(".cover-slide", this._inviewAnimation),
      new ScrollObserver(".appear", this._inviewAnimation),
      new ScrollObserver(".tween-animate-title", this._textAnimation)
    );
  }

  _toggleSlideAnimation(el, inview) {
    if (inview) {
      this.hero.start();
    } else {
      this.hero.stop();
    }
  }

  _textAnimation(el, inview) {
    if (inview) {
      const ta = new TweenTextAnimation(el);
      ta.animate();
    }
  }

  _navAnimation(el, inview) {
    if (inview) {
      this.header.classList.remove("triggered");
    } else {
      this.header.classList.add("triggered");
    }
  }
  _navBanner(el, inview) {
    if (inview) {
      this.banner.classList.remove("triggered");
    } else {
      this.banner.classList.add("triggered");
    }
  }

  _sideAnimation(el, inview) {
    if (inview) {
      this.sides.forEach((side) => side.classList.add("inview"));
    } else {
      this.sides.forEach((side) => side.classList.remove("inview"));
    }
  }

  _inviewAnimation(el, inview) {
    if (inview) {
      el.classList.add("inview");
    } else {
      el.classList.remove("inview");
    }
  }
}
const main = new Main();
