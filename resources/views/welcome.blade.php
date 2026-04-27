<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nurseryz.io — Smarter Agroforestry for Uganda</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest:  #1A4D3A;
      --mid:     #2E7D5E;
      --lime:    #8BC53F;
      --earth:   #5C3D1E;
      --sand:    #F5EDD6;
      --cream:   #F6FAF3;
      --white:   #FFFFFF;
      --ink:     #0F1E17;
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Outfit', sans-serif; background: var(--cream); color: var(--forest); overflow-x: hidden; }

    /* ── UTILITIES ─────────────────────────────────────────── */
    .container { max-width: 1200px; margin: 0 auto; padding: 0 5%; }
    .label {
      display: inline-flex; align-items: center; gap: .6rem;
      font-size: .75rem; font-weight: 600; letter-spacing: .14em;
      text-transform: uppercase; color: var(--mid); margin-bottom: 1rem;
    }
    .label::before { content:''; display:block; width:1.75rem; height:2px; background:var(--lime); }
    h2.display {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2rem, 5.5vw, 3.75rem);
      font-weight: 800; line-height: 1.06; letter-spacing: -.03em;
      color: var(--forest);
    }
    h2.display-white { color: var(--white); }
    .body-lg { font-size: 1.1rem; line-height: 1.8; color: rgba(26,77,58,.65); font-weight: 300; }
    .body-lg-white { color: rgba(255,255,255,.6); }
    .reveal { opacity:0; transform:translateY(44px); transition: opacity .85s cubic-bezier(.22,1,.36,1), transform .85s cubic-bezier(.22,1,.36,1); }
    .reveal.visible { opacity:1; transform:none; }
    .d1{transition-delay:.08s} .d2{transition-delay:.18s} .d3{transition-delay:.28s} .d4{transition-delay:.38s} .d5{transition-delay:.48s}

    /* ── NAV ────────────────────────────────────────────────── */
    #nav {
      position:fixed; top:0; left:0; right:0; z-index:200;
      display:flex; align-items:center; justify-content:space-between;
      padding:1.1rem 5%;
      transition: background .35s, box-shadow .35s;
    }
    #nav.solid { background:rgba(15,30,23,.93); backdrop-filter:blur(16px); box-shadow:0 2px 24px rgba(0,0,0,.22); }
    .nav-brand { font-family:'Syne',sans-serif; font-weight:800; font-size:1.35rem; color:var(--white); text-decoration:none; letter-spacing:-.02em; }
    .nav-brand span { color:var(--lime); }
    .nav-links { display:flex; align-items:center; gap:2rem; list-style:none; }
    .nav-links a { font-size:.9rem; font-weight:500; color:rgba(255,255,255,.55); text-decoration:none; transition:color .2s; }
    .nav-links a:hover { color:var(--white); }
    .nav-login {
      display:inline-flex; align-items:center; gap:.45rem;
      padding:.55rem 1.3rem; border-radius:100px;
      border:1.5px solid rgba(139,197,63,.5);
      color:var(--lime); font-size:.875rem; font-weight:600;
      text-decoration:none; transition:background .2s, border-color .2s;
    }
    .nav-login:hover { background:rgba(139,197,63,.12); border-color:var(--lime); }
    .nav-login svg { width:14px; height:14px; }
    .hamburger { display:none; flex-direction:column; gap:5px; cursor:pointer; padding:4px; }
    .hamburger span { display:block; width:22px; height:2px; background:var(--white); border-radius:2px; transition:.3s; }

    /* ── HERO ───────────────────────────────────────────────── */
    #hero {
      min-height:100vh; position:relative; overflow:hidden;
      background: var(--ink);
      display:flex; align-items:center;
    }
    .hero-bg {
      position:absolute; inset:0;
      background: radial-gradient(ellipse 70% 80% at 60% 50%, rgba(46,125,94,.22) 0%, transparent 70%),
                  radial-gradient(ellipse 50% 60% at 10% 80%, rgba(26,77,58,.35) 0%, transparent 65%),
                  linear-gradient(170deg, #0F1E17 0%, #1A4D3A 50%, #0a1a0f 100%);
    }
    .hero-grid-lines {
      position:absolute; inset:0; opacity:.06;
      background-image: linear-gradient(var(--lime) 1px, transparent 1px), linear-gradient(90deg, var(--lime) 1px, transparent 1px);
      background-size: 60px 60px;
    }
    .hero-content { position:relative; z-index:2; padding: 10rem 5% 6rem; max-width:1200px; margin:0 auto; width:100%; }
    .hero-badge {
      display:inline-flex; align-items:center; gap:.5rem;
      background:rgba(139,197,63,.1); border:1px solid rgba(139,197,63,.25);
      color:var(--lime); font-size:.78rem; font-weight:600; letter-spacing:.12em;
      text-transform:uppercase; padding:.35rem 1rem; border-radius:100px;
      margin-bottom:2rem; animation: fadeUp .7s .2s both;
    }
    .hero-badge-dot { width:6px; height:6px; background:var(--lime); border-radius:50%; animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.3} }
    .hero-headline {
      font-family:'Syne',sans-serif;
      font-size:clamp(3.2rem,10vw,7.5rem);
      font-weight:800; line-height:.95; letter-spacing:-.04em;
      color:var(--white); margin-bottom:1.75rem;
      animation:fadeUp .9s .3s both;
    }
    .hero-headline em { color:var(--lime); font-style:normal; }
    .hero-headline .stroke-text {
      -webkit-text-stroke:2px rgba(139,197,63,.5);
      color:transparent;
    }
    .hero-sub {
      font-size:clamp(1rem,2.2vw,1.2rem); color:rgba(255,255,255,.55);
      max-width:580px; line-height:1.8; font-weight:300;
      margin-bottom:2.75rem; animation:fadeUp .9s .5s both;
    }
    .hero-actions { display:flex; gap:1rem; flex-wrap:wrap; animation:fadeUp .9s .65s both; }
    .btn-lime {
      display:inline-flex; align-items:center; gap:.5rem;
      padding:.9rem 2rem; background:var(--lime); color:var(--forest);
      font-family:'Outfit',sans-serif; font-weight:700; font-size:.95rem;
      border-radius:100px; text-decoration:none;
      box-shadow:0 4px 28px rgba(139,197,63,.35);
      transition:transform .2s, box-shadow .2s;
    }
    .btn-lime:hover { transform:translateY(-3px); box-shadow:0 10px 36px rgba(139,197,63,.45); }
    .btn-ghost {
      display:inline-flex; align-items:center; gap:.5rem;
      padding:.9rem 2rem; border:1.5px solid rgba(255,255,255,.2);
      color:rgba(255,255,255,.8); font-family:'Outfit',sans-serif;
      font-weight:600; font-size:.95rem; border-radius:100px;
      text-decoration:none; transition:border-color .2s, background .2s;
    }
    .btn-ghost:hover { border-color:rgba(255,255,255,.5); background:rgba(255,255,255,.05); }
    .hero-stats {
      display:grid; grid-template-columns:repeat(3,1fr);
      gap:2px; margin-top:5rem; background:rgba(255,255,255,.06); border-radius:16px; overflow:hidden;
      animation:fadeUp .9s .8s both;
    }
    .hero-stat { padding:1.5rem 2rem; background:rgba(255,255,255,.03); }
    .hero-stat .big { font-family:'Syne',sans-serif; font-size:2.2rem; font-weight:800; color:var(--lime); line-height:1; }
    .hero-stat p { font-size:.85rem; color:rgba(255,255,255,.45); margin-top:.4rem; font-weight:300; }

    /* ── MARQUEE ─────────────────────────────────────────────── */
    .marquee-bar { background:var(--lime); padding:.8rem 0; overflow:hidden; white-space:nowrap; }
    .marquee-inner { display:inline-block; animation:marquee 24s linear infinite; }
    .marquee-inner span { font-family:'Syne',sans-serif; font-size:.95rem; font-weight:700; color:var(--forest); margin:0 2rem; text-transform:uppercase; letter-spacing:.06em; }
    .m-dot { display:inline-block; width:5px; height:5px; background:var(--forest); border-radius:50%; vertical-align:middle; margin:0 .3rem; }
    @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }

    /* ── PROBLEM SECTION ─────────────────────────────────────── */
    #problem { padding:8rem 0; background:var(--white); }
    .problem-grid { display:grid; grid-template-columns:1fr 1fr; gap:6rem; align-items:center; }
    .problem-visual {
      position:relative; border-radius:28px; overflow:hidden;
      background:linear-gradient(135deg, #f5edd6, #e8dcc4);
      padding:3rem; min-height:420px;
      display:flex; flex-direction:column; justify-content:space-between;
    }
    .problem-visual::before {
      content:''; position:absolute; inset:0;
      background: radial-gradient(circle at 80% 20%, rgba(139,197,63,.15), transparent 60%);
    }
    .problem-icon-large {
      font-size:5rem; line-height:1;
      filter:drop-shadow(0 8px 24px rgba(92,61,30,.2));
      position:relative; z-index:1;
    }
    .problem-quote {
      position:relative; z-index:1;
      background:var(--white); border-radius:16px;
      padding:1.25rem 1.5rem;
      border-left:4px solid var(--lime);
      box-shadow:0 8px 32px rgba(26,77,58,.1);
    }
    .problem-quote p { font-size:.95rem; line-height:1.7; color:var(--forest); font-weight:400; }
    .problem-quote cite { font-size:.78rem; color:rgba(26,77,58,.5); margin-top:.5rem; display:block; }
    .loss-pills { display:flex; flex-direction:column; gap:.75rem; margin-top:2rem; }
    .loss-pill {
      display:flex; align-items:center; gap:.75rem;
      padding:.9rem 1.25rem; background:var(--cream);
      border-radius:12px; border:1px solid rgba(26,77,58,.08);
      font-size:.9rem; color:var(--forest); font-weight:400;
    }
    .loss-pill .icon { font-size:1.1rem; flex-shrink:0; }
    .loss-pill .bar { flex:1; height:4px; background:rgba(26,77,58,.08); border-radius:4px; overflow:hidden; }
    .loss-pill .bar-fill { height:100%; background:var(--lime); border-radius:4px; }

    /* ── SOLUTION CARDS ──────────────────────────────────────── */
    #solution { padding:8rem 0; background:var(--cream); }
    .solution-intro { text-align:center; max-width:720px; margin:0 auto 5rem; }
    .pillar-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; }
    .pillar {
      background:var(--white); border-radius:24px; padding:2.5rem;
      border:1.5px solid rgba(26,77,58,.07);
      transition:transform .35s, box-shadow .35s, border-color .35s;
      display:flex; flex-direction:column;
    }
    .pillar:hover { transform:translateY(-10px); box-shadow:0 24px 56px rgba(26,77,58,.1); border-color:var(--lime); }
    .pillar-num { font-family:'Syne',sans-serif; font-size:.75rem; font-weight:700; color:var(--lime); letter-spacing:.14em; margin-bottom:1.25rem; }
    .pillar-icon {
      width:52px; height:52px; border-radius:14px;
      display:flex; align-items:center; justify-content:center;
      margin-bottom:1.5rem; flex-shrink:0;
    }
    .pillar-icon svg { width:26px; height:26px; stroke:var(--white); fill:none; stroke-width:2; stroke-linecap:round; stroke-linejoin:round; }
    .pillar h3 { font-family:'Syne',sans-serif; font-size:1.25rem; font-weight:700; color:var(--forest); margin-bottom:.75rem; }
    .pillar p { font-size:.92rem; color:rgba(26,77,58,.6); line-height:1.75; font-weight:300; flex:1; }
    .pillar-tags { display:flex; flex-wrap:wrap; gap:.35rem; margin-top:1.5rem; }
    .ptag { font-size:.72rem; font-weight:600; padding:.28rem .7rem; border-radius:100px; }
    .ptag-green { background:rgba(139,197,63,.12); color:var(--mid); }
    .ptag-earth { background:rgba(92,61,30,.08); color:var(--earth); }

    /* ── HOW IT WORKS ────────────────────────────────────────── */
    #how { padding:8rem 0; background:linear-gradient(180deg, var(--ink) 0%, #0d2e1f 100%); overflow:hidden; position:relative; }
    #how .label { color:var(--lime); }
    #how .label::before { background:var(--lime); }
    .steps-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:1px; margin-top:5rem; position:relative; }
    .steps-grid::before {
      content:''; position:absolute; top:52px; left:calc(12.5% + 25px); right:calc(12.5% + 25px);
      height:2px; background:linear-gradient(90deg, var(--lime), rgba(139,197,63,.1));
      z-index:0;
    }
    .step { padding:0 1.5rem; text-align:center; position:relative; z-index:1; }
    .step-circle {
      width:52px; height:52px; border-radius:50%;
      background:var(--lime); color:var(--forest);
      font-family:'Syne',sans-serif; font-weight:800; font-size:1.1rem;
      display:flex; align-items:center; justify-content:center;
      margin:0 auto 1.5rem; position:relative;
      box-shadow:0 0 0 8px rgba(139,197,63,.15);
    }
    .step h4 { font-family:'Syne',sans-serif; font-size:1rem; font-weight:700; color:var(--white); margin-bottom:.6rem; }
    .step p { font-size:.85rem; color:rgba(255,255,255,.45); line-height:1.7; font-weight:300; }

    /* ── AUDIENCE TABS ────────────────────────────────────────── */
    #audiences { padding:8rem 0; background:var(--white); }
    .tab-nav { display:flex; gap:.5rem; margin-bottom:4rem; background:var(--cream); padding:.4rem; border-radius:16px; max-width:560px; }
    .tab-btn {
      flex:1; padding:.75rem 1rem; border-radius:12px; border:none;
      font-family:'Outfit',sans-serif; font-weight:600; font-size:.88rem;
      cursor:pointer; transition:background .25s, color .25s, box-shadow .25s;
      background:transparent; color:rgba(26,77,58,.5);
    }
    .tab-btn.active {
      background:var(--white); color:var(--forest);
      box-shadow:0 2px 12px rgba(26,77,58,.1);
    }
    .tab-panel { display:none; }
    .tab-panel.active { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center; animation:panelIn .5s both; }
    @keyframes panelIn { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:none} }
    .audience-feat-list { display:flex; flex-direction:column; gap:1rem; margin-top:2rem; }
    .feat-row { display:flex; align-items:flex-start; gap:1rem; }
    .feat-check {
      width:32px; height:32px; border-radius:10px;
      background:rgba(139,197,63,.1); color:var(--lime);
      display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:.1rem;
    }
    .feat-check svg { width:16px; height:16px; }
    .feat-row h4 { font-family:'Syne',sans-serif; font-size:1rem; font-weight:700; color:var(--forest); }
    .feat-row p { font-size:.88rem; color:rgba(26,77,58,.6); margin-top:.2rem; line-height:1.6; font-weight:300; }
    .mock-screen {
      background:var(--forest); border-radius:24px; overflow:hidden;
      box-shadow:0 32px 80px rgba(26,77,58,.2);
    }
    .mock-topbar {
      background:rgba(0,0,0,.25); padding:1rem 1.5rem;
      display:flex; align-items:center; justify-content:space-between;
    }
    .mock-dot-row { display:flex; gap:.4rem; }
    .mock-dot { width:8px; height:8px; border-radius:50%; }
    .mock-body { padding:1.5rem; }
    .mock-stat-row { display:grid; grid-template-columns:repeat(3,1fr); gap:.75rem; margin-bottom:1rem; }
    .mock-stat { background:rgba(255,255,255,.07); border-radius:12px; padding:1rem; }
    .mock-stat .val { font-family:'Syne',sans-serif; font-size:1.4rem; font-weight:800; color:var(--lime); }
    .mock-stat .lbl { font-size:.7rem; color:rgba(255,255,255,.4); margin-top:.2rem; }
    .mock-chart { background:rgba(255,255,255,.04); border-radius:12px; padding:1rem; height:90px; position:relative; overflow:hidden; margin-bottom:.75rem; }
    .chart-bars { display:flex; align-items:flex-end; gap:6px; height:100%; }
    .chart-bar { flex:1; background:rgba(139,197,63,.3); border-radius:4px 4px 0 0; transition:.3s; }
    .chart-bar:nth-child(odd) { background:rgba(139,197,63,.55); }
    .mock-list { display:flex; flex-direction:column; gap:.5rem; }
    .mock-row { background:rgba(255,255,255,.05); border-radius:10px; padding:.7rem 1rem; display:flex; align-items:center; gap:.75rem; }
    .mock-avatar { width:28px; height:28px; border-radius:8px; background:rgba(139,197,63,.2); display:flex; align-items:center; justify-content:center; font-size:.65rem; color:var(--lime); font-weight:700; flex-shrink:0; }
    .mock-row-text .t { font-size:.75rem; color:rgba(255,255,255,.7); font-weight:500; }
    .mock-row-text .s { font-size:.68rem; color:rgba(255,255,255,.3); }
    .mock-badge { margin-left:auto; font-size:.65rem; padding:.2rem .55rem; border-radius:6px; font-weight:600; }
    .badge-green { background:rgba(139,197,63,.15); color:var(--lime); }
    .badge-yellow { background:rgba(250,180,60,.15); color:#fab43c; }
    /* SMS mock */
    .sms-mock { background:#1a1a1a; border-radius:24px; overflow:hidden; box-shadow:0 32px 80px rgba(0,0,0,.3); }
    .sms-header { background:#2a2a2a; padding:1rem 1.5rem; display:flex; align-items:center; gap:.75rem; }
    .sms-avatar { width:36px; height:36px; border-radius:50%; background:var(--lime); display:flex; align-items:center; justify-content:center; font-family:'Syne',sans-serif; font-weight:800; font-size:.85rem; color:var(--forest); }
    .sms-name { font-size:.9rem; font-weight:600; color:var(--white); }
    .sms-status { font-size:.75rem; color:rgba(255,255,255,.4); }
    .sms-body { padding:1.25rem; display:flex; flex-direction:column; gap:.75rem; }
    .sms-msg { max-width:80%; padding:.75rem 1rem; border-radius:16px; font-size:.82rem; line-height:1.6; }
    .sms-in { background:#2c2c2c; color:rgba(255,255,255,.8); border-bottom-left-radius:4px; }
    .sms-out { background:var(--lime); color:var(--forest); font-weight:500; align-self:flex-end; border-bottom-right-radius:4px; }
    /* Trace mock */
    .trace-mock { background:var(--cream); border-radius:24px; padding:2rem; box-shadow:0 32px 80px rgba(26,77,58,.12); }
    .trace-chain { display:flex; flex-direction:column; gap:0; }
    .trace-node {
      display:flex; align-items:flex-start; gap:1rem; padding:1rem 0;
      border-left:2px solid rgba(139,197,63,.3); margin-left:18px; padding-left:1.5rem;
      position:relative;
    }
    .trace-node::before {
      content:''; position:absolute; left:-9px; top:1.25rem;
      width:16px; height:16px; border-radius:50%;
      background:var(--lime); border:3px solid var(--cream);
    }
    .trace-node:last-child { border-color:transparent; }
    .trace-node-icon { font-size:1.2rem; flex-shrink:0; margin-top:.1rem; }
    .trace-node h5 { font-family:'Syne',sans-serif; font-size:.9rem; font-weight:700; color:var(--forest); }
    .trace-node p { font-size:.78rem; color:rgba(26,77,58,.55); line-height:1.6; margin-top:.1rem; }
    .trace-node .trace-meta { font-size:.7rem; color:var(--mid); font-weight:600; margin-top:.3rem; display:flex; gap:.75rem; flex-wrap:wrap; }
    .qr-box { background:var(--white); border-radius:16px; padding:1.25rem; margin-top:1rem; display:flex; align-items:center; gap:1rem; border:1px solid rgba(26,77,58,.1); }
    .qr-visual { width:56px; height:56px; flex-shrink:0; }
    .qr-visual svg { width:100%; height:100%; }
    .qr-text h5 { font-family:'Syne',sans-serif; font-size:.9rem; font-weight:700; color:var(--forest); }
    .qr-text p { font-size:.75rem; color:rgba(26,77,58,.5); margin-top:.2rem; }

    /* ── TRACEABILITY ─────────────────────────────────────────── */
    #traceability { padding:8rem 0; background:var(--forest); }
    #traceability .label { color:var(--lime); }
    #traceability .label::before { background:var(--lime); }
    .trace-3col { display:grid; grid-template-columns:repeat(3,1fr); gap:1.5rem; margin-top:4rem; }
    .trace-card {
      background:rgba(255,255,255,.05); border-radius:20px; padding:2rem;
      border:1px solid rgba(255,255,255,.08);
      transition:background .3s, border-color .3s;
    }
    .trace-card:hover { background:rgba(255,255,255,.09); border-color:rgba(139,197,63,.3); }
    .trace-card-icon { font-size:2rem; margin-bottom:1.25rem; }
    .trace-card h3 { font-family:'Syne',sans-serif; font-size:1.15rem; font-weight:700; color:var(--white); margin-bottom:.6rem; }
    .trace-card p { font-size:.88rem; color:rgba(255,255,255,.5); line-height:1.75; font-weight:300; }

    /* ── IMPACT ──────────────────────────────────────────────── */
    #impact { padding:8rem 0; background:var(--cream); }
    .impact-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:1px; background:rgba(26,77,58,.08); border-radius:24px; overflow:hidden; margin-top:4rem; }
    .impact-cell { padding:2.5rem 2rem; background:var(--cream); text-align:center; transition:background .25s; }
    .impact-cell:hover { background:var(--white); }
    .impact-cell .big { font-family:'Syne',sans-serif; font-size:2.8rem; font-weight:800; color:var(--forest); line-height:1; }
    .impact-cell .big span { color:var(--lime); }
    .impact-cell p { font-size:.85rem; color:rgba(26,77,58,.55); margin-top:.6rem; line-height:1.5; font-weight:300; }

    /* ── CTA ─────────────────────────────────────────────────── */
    #cta { padding:9rem 0; background:linear-gradient(160deg, var(--forest) 0%, var(--ink) 100%); text-align:center; position:relative; overflow:hidden; }
    #cta::before {
      content:''; position:absolute; inset:0;
      background: radial-gradient(ellipse 60% 70% at 50% 50%, rgba(139,197,63,.12), transparent 70%);
    }
    #cta .container { position:relative; z-index:1; }
    #cta .display { color:var(--white); max-width:700px; margin:0 auto 1.25rem; }
    #cta .body-lg { max-width:500px; margin:0 auto 3rem; color:rgba(255,255,255,.5); }
    .cta-actions { display:flex; gap:1rem; justify-content:center; flex-wrap:wrap; }
    .btn-white {
      display:inline-flex; align-items:center; gap:.5rem;
      padding:.9rem 2rem; background:var(--white); color:var(--forest);
      font-family:'Outfit',sans-serif; font-weight:700; font-size:.95rem;
      border-radius:100px; text-decoration:none;
      transition:transform .2s, box-shadow .2s;
      box-shadow:0 4px 24px rgba(255,255,255,.15);
    }
    .btn-white:hover { transform:translateY(-3px); box-shadow:0 10px 36px rgba(255,255,255,.2); }

    /* ── FOOTER ──────────────────────────────────────────────── */
    footer { background:var(--ink); padding:3.5rem 5%; }
    .footer-inner { display:flex; justify-content:space-between; align-items:flex-start; gap:3rem; flex-wrap:wrap; }
    .footer-brand-col .brand { font-family:'Syne',sans-serif; font-weight:800; font-size:1.4rem; color:var(--white); text-decoration:none; letter-spacing:-.02em; }
    .footer-brand-col .brand span { color:var(--lime); }
    .footer-brand-col p { font-size:.85rem; color:rgba(255,255,255,.35); margin-top:.6rem; max-width:220px; line-height:1.7; font-weight:300; }
    .footer-links-col h4 { font-size:.75rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:rgba(255,255,255,.35); margin-bottom:1rem; }
    .footer-links-col ul { list-style:none; display:flex; flex-direction:column; gap:.6rem; }
    .footer-links-col a { font-size:.88rem; color:rgba(255,255,255,.5); text-decoration:none; transition:color .2s; }
    .footer-links-col a:hover { color:var(--white); }
    .footer-bottom { border-top:1px solid rgba(255,255,255,.07); margin-top:3rem; padding-top:1.5rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem; }
    .footer-bottom p { font-size:.8rem; color:rgba(255,255,255,.25); }

    /* ── RESPONSIVE ──────────────────────────────────────────── */
    @media(max-width:900px) {
      .pillar-grid { grid-template-columns:1fr; }
      .problem-grid,.tab-panel.active,.trace-3col { grid-template-columns:1fr; gap:3rem; }
      .steps-grid { grid-template-columns:1fr 1fr; }
      .steps-grid::before { display:none; }
      .impact-grid { grid-template-columns:1fr 1fr; }
      .nav-links { display:none; }
      .hamburger { display:flex; }
      .hero-stats { grid-template-columns:1fr; }
    }
    @media(max-width:600px) {
      .hero-headline { font-size:3rem; }
      .impact-grid { grid-template-columns:1fr; }
      .tab-nav { flex-direction:column; }
      .footer-inner { flex-direction:column; }
    }

    @keyframes fadeUp { from{opacity:0;transform:translateY(32px)} to{opacity:1;transform:none} }
  </style>
</head>
<body>

<!-- ═══ NAV ═══════════════════════════════════════════════════ -->
<nav id="nav">
  <a href="#" class="nav-brand">Nurseryz<span>.io</span></a>
  <ul class="nav-links">
    <li><a href="#problem">The Problem</a></li>
    <li><a href="#solution">Solutions</a></li>
    <li><a href="#audiences">For You</a></li>
    <li><a href="#traceability">Traceability</a></li>
    <li><a href="#cta">Get Access</a></li>
  </ul>
  <a href="/admin" class="nav-login">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
    Owner Login
  </a>
  <div class="hamburger" onclick="document.querySelector('#nav .nav-links').style.display='flex'">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- ═══ HERO ════════════════════════════════════════════════════ -->
<section id="hero">
  <div class="hero-bg"></div>
  <div class="hero-grid-lines"></div>
  <div class="hero-content">
    <div class="hero-badge">
      <div class="hero-badge-dot"></div>
      Uganda's Agri-Tech Platform — Now Live
    </div>
    <h1 class="hero-headline">
      Grow Uganda.<br>
      <em>10×</em> <span class="stroke-text">Smarter.</span>
    </h1>
    <p class="hero-sub">
      Nurseryz.io connects nursery owners, smallholder farmers, buyers and government — through QR traceability, digital advisory and real-time dashboards. From seed to sale, nothing falls through the cracks.
    </p>
    <div class="hero-actions">
      <a href="#solution" class="btn-lime">
        See How It Works
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
      <a href="/admin" class="btn-ghost">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 9h18M9 21V9"/></svg>
        Owner Dashboard
      </a>
    </div>
    <div class="hero-stats">
      <div class="hero-stat"><div class="big">SMS</div><p>Reaches every farmer, no smartphone needed</p></div>
      <div class="hero-stat"><div class="big">QR</div><p>Full traceability from nursery to offtake buyer</p></div>
      <div class="hero-stat"><div class="big">5B+</div><p>Uganda's target economy — we're part of the push</p></div>
    </div>
  </div>
</section>

<!-- ═══ MARQUEE ══════════════════════════════════════════════════ -->
<div class="marquee-bar">
  <div class="marquee-inner">
    <span>Nursery Management<span class="m-dot"></span></span>
    <span>SMS Advisory<span class="m-dot"></span></span>
    <span>WhatsApp Bot<span class="m-dot"></span></span>
    <span>QR Traceability<span class="m-dot"></span></span>
    <span>Coffee Farming<span class="m-dot"></span></span>
    <span>Cocoa Growing<span class="m-dot"></span></span>
    <span>Agroforestry<span class="m-dot"></span></span>
    <span>Northern Uganda<span class="m-dot"></span></span>
    <span>Farmer Income<span class="m-dot"></span></span>
    <span>Nursery Management<span class="m-dot"></span></span>
    <span>SMS Advisory<span class="m-dot"></span></span>
    <span>WhatsApp Bot<span class="m-dot"></span></span>
    <span>QR Traceability<span class="m-dot"></span></span>
    <span>Coffee Farming<span class="m-dot"></span></span>
    <span>Cocoa Growing<span class="m-dot"></span></span>
    <span>Agroforestry<span class="m-dot"></span></span>
    <span>Northern Uganda<span class="m-dot"></span></span>
    <span>Farmer Income<span class="m-dot"></span></span>
  </div>
</div>

<!-- ═══ THE PROBLEM ══════════════════════════════════════════════ -->
<section id="problem">
  <div class="container">
    <div class="problem-grid">
      <div class="reveal">
        <p class="label">The Knowledge Gap</p>
        <h2 class="display" style="margin-bottom:1.25rem;">Seedlings die.<br>Farmers lose.<br>We fix that.</h2>
        <p class="body-lg" style="margin-bottom:1.5rem;">
          Thousands of smallholder farmers across Northern Uganda and Nationwide are lately engaging more into coffee, cocoa and tree planting, and yet most receive their seedlings with no guidance on shade preparation, spacing, watering, weeding, or soil management.
        </p>
        <p class="body-lg" style="margin-bottom:2rem;">
          Without knowledge, seedlings die within weeks. That's a huge economic loss for the farmer and reputational damage for every nursery that sold them. Nurseryz.io closes that gap.
        </p>
        <div class="loss-pills">
          <div class="loss-pill"><span class="icon">🌱</span><span style="flex:1">Seedlings lost to poor spacing</span><div class="bar"><div class="bar-fill" style="width:72%"></div></div><span style="font-size:.8rem;font-weight:600;color:var(--mid)">72%</span></div>
          <div class="loss-pill"><span class="icon">💧</span><span style="flex:1">Deaths from watering errors</span><div class="bar"><div class="bar-fill" style="width:61%"></div></div><span style="font-size:.8rem;font-weight:600;color:var(--mid)">61%</span></div>
          <div class="loss-pill"><span class="icon">🌿</span><span style="flex:1">Losses from shade neglect</span><div class="bar"><div class="bar-fill" style="width:55%"></div></div><span style="font-size:.8rem;font-weight:600;color:var(--mid)">55%</span></div>
        </div>
      </div>
      <div class="reveal d2">
        <div class="problem-visual">
          <div class="problem-icon-large">🌿</div>
          <div class="problem-quote">
            <p>"I bought 200 cocoa seedlings. By the third month, only 60 were alive and healthy. I didn't know about shade trees."</p>
            <cite>— Smallholder farmer, Alebtong District</cite>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SOLUTION ═════════════════════════════════════════════════ -->
<section id="solution">
  <div class="container">
    <div class="solution-intro reveal">
      <p class="label" style="justify-content:center">Our Three Pillars</p>
      <h2 class="display" style="margin-bottom:1rem;">One platform.<br>Three powerful tools.</h2>
      <p class="body-lg" style="max-width:600px;margin:0 auto;text-align:center;">Built for nursery owners, designed for farmers, trusted by buyers and government.</p>
    </div>
    <div class="pillar-grid">
      <div class="pillar reveal d1">
        <div class="pillar-num">01 — DASHBOARD</div>
        <div class="pillar-icon" style="background:linear-gradient(135deg,var(--mid),var(--forest))">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
        </div>
        <h3>Nursery Owner Dashboard</h3>
        <p>A full business intelligence portal for nursery bed owners. Monitor seedling inventory, track sales, view growth analytics, manage customers and export reports — all in one place.</p>
        <div class="pillar-tags">
          <span class="ptag ptag-green">Inventory</span>
          <span class="ptag ptag-green">Sales Analytics</span>
          <span class="ptag ptag-green">Customer Records</span>
          <span class="ptag ptag-earth">Seedling Progress</span>
        </div>
      </div>
      <div class="pillar reveal d2">
        <div class="pillar-num">02 — ADVISORY BOT</div>
        <div class="pillar-icon" style="background:linear-gradient(135deg,#25D366,#128C7E)">
          <svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3>Dual-Channel Advisory Bot</h3>
        <p>Farmers receive planting guidance, care schedules and best practices over <strong>WhatsApp</strong> and basic <strong>SMS</strong> — covering every farmer regardless of whether they own a smartphone.</p>
        <div class="pillar-tags">
          <span class="ptag ptag-green">WhatsApp</span>
          <span class="ptag ptag-green">SMS</span>
          <span class="ptag ptag-earth">Coffee Guides</span>
          <span class="ptag ptag-earth">Cocoa Guides</span>
        </div>
      </div>
      <div class="pillar reveal d3">
        <div class="pillar-num">03 — TRACEABILITY</div>
        <div class="pillar-icon" style="background:linear-gradient(135deg,#e8a020,#c47a10)">
          <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>QR-Based Traceability</h3>
        <p>Every seedling batch carries a QR code. Buyers, exporters, and government agencies can trace cocoa or coffee produce from the nursery bed all the way to the offtake point — ensuring quality and research integrity.</p>
        <div class="pillar-tags">
          <span class="ptag ptag-green">QR Codes</span>
          <span class="ptag ptag-green">Buyer Verification</span>
          <span class="ptag ptag-earth">Govt. Reporting</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ HOW IT WORKS ═════════════════════════════════════════════ -->
<section id="how">
  <div class="container">
    <div class="reveal" style="text-align:center;max-width:620px;margin:0 auto;">
      <p class="label" style="justify-content:center">The Journey</p>
      <h2 class="display display-white" style="margin-bottom:1rem;">From nursery bed to harvest — fully connected.</h2>
    </div>
    <div class="steps-grid reveal d1">
      <div class="step">
        <div class="step-circle">1</div>
        <h4>Nursery Registers</h4>
        <p>Owner signs up, sets up their nursery profile, and adds seedling batches — each assigned a QR code.</p>
      </div>
      <div class="step">
        <div class="step-circle">2</div>
        <h4>Farmer Purchases</h4>
        <p>Farmer buys seedlings. Their contact is captured — SMS or WhatsApp advisory begins immediately.</p>
      </div>
      <div class="step">
        <div class="step-circle">3</div>
        <h4>Bot Guides Growth</h4>
        <p>Scheduled alerts on shade prep, watering, weeding and soil care arrive at the right time, every time.</p>
      </div>
      <div class="step">
        <div class="step-circle">4</div>
        <h4>Buyers Trace & Verify</h4>
        <p>Offtakers scan QR codes to verify origin, variety, and handling history for quality assurance.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ AUDIENCE TABS ════════════════════════════════════════════ -->
<section id="audiences">
  <div class="container">
    <div class="reveal" style="margin-bottom:3rem;">
      <p class="label">Built For Everyone</p>
      <h2 class="display">The right tool<br>for each role.</h2>
    </div>
    <div class="tab-nav reveal d1">
      <button class="tab-btn active" onclick="showTab('owners',this)">🏡 Nursery Owners</button>
      <button class="tab-btn" onclick="showTab('farmers',this)">👨‍🌾 Farmers</button>
      <button class="tab-btn" onclick="showTab('buyers',this)">🏢 Buyers & Govt</button>
    </div>

    <!-- OWNERS -->
    <div class="tab-panel active" id="tab-owners">
      <div class="reveal">
        <p class="label">For Nursery Owners</p>
        <h3 style="font-family:'Syne',sans-serif;font-size:clamp(1.6rem,4vw,2.4rem);font-weight:800;color:var(--forest);line-height:1.15;margin-bottom:1.25rem;">Run your nursery business like a pro.</h3>
        <p class="body-lg" style="margin-bottom:1rem;">Log in to your personalised dashboard and get complete visibility over your nursery — inventory, customers, sales, seedling health and business growth — from any device.</p>
        <div class="audience-feat-list">
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Real-time Inventory Tracking</h4><p>Know exactly how many seedlings you have, by species and batch, at any moment.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Sales & Revenue Analytics</h4><p>Track income, top-selling varieties, and seasonal trends with clear visual reports.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Customer & Seedling Records</h4><p>Every sale tied to a farmer — enabling follow-up and advisory without extra work.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>QR Code Generation</h4><p>Print batch-level QR codes for seedlings — enabling end-to-end traceability at no extra effort.</p></div>
          </div>
        </div>
        <div style="margin-top:2rem;">
          <a href="/admin" class="btn-lime">Login to Dashboard →</a>
        </div>
      </div>
      <div class="reveal d2">
        <div class="mock-screen">
          <div class="mock-topbar">
            <span style="font-family:'Syne',sans-serif;font-size:.82rem;font-weight:700;color:var(--lime)">Nurseryz.io</span>
            <div class="mock-dot-row">
              <div class="mock-dot" style="background:#ff5f57"></div>
              <div class="mock-dot" style="background:#febc2e"></div>
              <div class="mock-dot" style="background:#28c840"></div>
            </div>
          </div>
          <div class="mock-body">
            <p style="font-size:.7rem;color:rgba(255,255,255,.35);margin-bottom:.75rem;font-weight:500;letter-spacing:.08em;text-transform:uppercase">GREENOM AGRI-TECH NURSERY Overview</p>
            <div class="mock-stat-row">
              <div class="mock-stat"><div class="val">1,240</div><div class="lbl">Seedlings</div></div>
              <div class="mock-stat"><div class="val">UGX 4.2M</div><div class="lbl">This Month</div></div>
              <div class="mock-stat"><div class="val">87%</div><div class="lbl">Survival Rate</div></div>
            </div>
            <div class="mock-chart">
              <div class="chart-bars">
                <div class="chart-bar" style="height:40%"></div>
                <div class="chart-bar" style="height:60%"></div>
                <div class="chart-bar" style="height:45%"></div>
                <div class="chart-bar" style="height:80%"></div>
                <div class="chart-bar" style="height:65%"></div>
                <div class="chart-bar" style="height:90%"></div>
                <div class="chart-bar" style="height:75%"></div>
                <div class="chart-bar" style="height:100%"></div>
              </div>
            </div>
            <div class="mock-list">
              <div class="mock-row">
                <div class="mock-avatar">CO</div>
                <div class="mock-row-text"><div class="t">Cocoa Batch #14 — Cona-Bar</div><div class="s">2000 seedlings · QR issued</div></div>
                <span class="mock-badge badge-green">Active</span>
              </div>
              <div class="mock-row">
                <div class="mock-avatar">CF</div>
                <div class="mock-row-text"><div class="t">Coffee Arabica — Lira</div><div class="s">1050 seedlings · Advisory on</div></div>
                <span class="mock-badge badge-green">Active</span>
              </div>
              <div class="mock-row">
                <div class="mock-avatar">AV</div>
                <div class="mock-row-text"><div class="t">Avocado Hass — Teso-Bar</div><div class="s">90 seedlings · Week 3</div></div>
                <span class="mock-badge badge-yellow">Follow-up</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FARMERS -->
    <div class="tab-panel" id="tab-farmers">
      <div class="reveal">
        <p class="label">For Farmers</p>
        <h3 style="font-family:'Syne',sans-serif;font-size:clamp(1.6rem,4vw,2.4rem);font-weight:800;color:var(--forest);line-height:1.15;margin-bottom:1.25rem;">Expert advice in your pocket — or your basic phone.</h3>
        <p class="body-lg" style="margin-bottom:1rem;">Whether you have a smartphone or a basic feature phone, our advisory bot reaches you. Get the right guidance, at the right time, in your language — for coffee, cocoa, avocado and trees.</p>
        <div class="audience-feat-list">
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>SMS Alerts — No Smartphone Needed</h4><p>Timely messages on planting, spacing, watering, weeding and harvesting — sent via SMS to any phone.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>WhatsApp Interactive Bot</h4><p>Ask questions and get detailed guidance on your specific crop, region and season via WhatsApp.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Coffee & Cocoa Specialisation</h4><p>Guides built specifically for Northern Uganda's conditions — shade preparation, soil pH, pest management and more.</p></div>
          </div>
        </div>
      </div>
      <div class="reveal d2">
        <div class="sms-mock">
          <div class="sms-header">
            <div class="sms-avatar">N</div>
            <div><div class="sms-name">Nurseryz.io Advisory</div><div class="sms-status">Automated · Cocoa Programme</div></div>
          </div>
          <div class="sms-body">
            <div class="sms-msg sms-in">🌱 Week 2 reminder: Your cocoa seedlings need shade. Plant banana or Grevillea trees 3m apart before transplanting.</div>
            <div class="sms-msg sms-out">What spacing do I use for cocoa?</div>
            <div class="sms-msg sms-in">For cocoa: plant 3m × 3m (about 1,100 trees/hectare). Dig holes 60cm deep. Add organic compost. Keep soil moist but not waterlogged. 🌿</div>
            <div class="sms-msg sms-in">📅 Next alert in 5 days: Weeding and first fertiliser application guide. Reply STOP to opt out.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- BUYERS -->
    <div class="tab-panel" id="tab-buyers">
      <div class="reveal">
        <p class="label">For Buyers & Government</p>
        <h3 style="font-family:'Syne',sans-serif;font-size:clamp(1.6rem,4vw,2.4rem);font-weight:800;color:var(--forest);line-height:1.15;margin-bottom:1.25rem;">Verify origin.<br>Guarantee quality.</h3>
        <p class="body-lg" style="margin-bottom:1rem;">Nurseryz.io's QR traceability system gives offtakers, exporters, research institutions and government agencies full visibility of where produce came from, how seedlings were handled, and whether best practices were followed.</p>
        <div class="audience-feat-list">
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Scan-to-Trace at Offtake</h4><p>One QR scan reveals the full journey — nursery, farmer, planting date, crop variety and advisory history.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Export Quality Certification Support</h4><p>Provide documented evidence of sustainable practices for international coffee and cocoa certification bodies.</p></div>
          </div>
          <div class="feat-row">
            <div class="feat-check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg></div>
            <div><h4>Research & Policy Data</h4><p>Aggregated, anonymised data for universities, MAAIF and NGOs studying agroforestry adoption rates and outcomes across Uganda.</p></div>
          </div>
        </div>
      </div>
      <div class="reveal d2">
        <div class="trace-mock">
          <p style="font-family:'Syne',sans-serif;font-size:.8rem;font-weight:700;color:var(--forest);letter-spacing:.1em;text-transform:uppercase;margin-bottom:1.25rem;opacity:.5">Trace Record — Batch #CO-2024-014</p>
          <div class="trace-chain">
            <div class="trace-node">
              <div class="trace-node-icon">🏡</div>
              <div>
                <h5>Green Valley Nursery, Lira</h5>
                <p>Cocoa hybrid seedlings — 2000 units. Grafted, certified. QR issued.</p>
                <div class="trace-meta"><span>📅 Apr 12, 2026</span><span>🌱 Variety: Forastero</span></div>
              </div>
            </div>
            <div class="trace-node">
              <div class="trace-node-icon">👨‍🌾</div>
              <div>
                <h5>Farmer: Okello Charles, Kole</h5>
                <p>Purchased 210 seedlings. Enrolled in SMS advisory programme week 1.</p>
                <div class="trace-meta"><span>📅 Mar 18, 2025</span><span>📱 SMS Advisory: Active</span></div>
              </div>
            </div>
            <div class="trace-node">
              <div class="trace-node-icon">🌿</div>
              <div>
                <h5>Field Establishment</h5>
                <p>Shade trees planted. Spacing 3×3m. 78 of 80 seedlings survived transplant.</p>
                <div class="trace-meta"><span>📅 Feb 3, 2026</span><span>✅ Survival: 97.5%</span></div>
              </div>
            </div>
            <div class="trace-node">
              <div class="trace-node-icon">🏢</div>
              <div>
                <h5>Offtake: Uganda Cocoa Alliance</h5>
                <p>First harvest verified. Scan confirmed sustainable origin and advisory compliance.</p>
                <div class="trace-meta"><span>📅 Projected Q2 2027</span><span>🔒 Certified Origin</span></div>
              </div>
            </div>
          </div>
          <div class="qr-box">
            <div class="qr-visual">
              <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                <rect width="80" height="80" fill="#f5edd6" rx="8"/>
                <rect x="8" y="8" width="24" height="24" rx="2" fill="none" stroke="#1A4D3A" stroke-width="3"/>
                <rect x="13" y="13" width="14" height="14" rx="1" fill="#1A4D3A"/>
                <rect x="48" y="8" width="24" height="24" rx="2" fill="none" stroke="#1A4D3A" stroke-width="3"/>
                <rect x="53" y="13" width="14" height="14" rx="1" fill="#1A4D3A"/>
                <rect x="8" y="48" width="24" height="24" rx="2" fill="none" stroke="#1A4D3A" stroke-width="3"/>
                <rect x="13" y="53" width="14" height="14" rx="1" fill="#1A4D3A"/>
                <rect x="48" y="48" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="57" y="48" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="66" y="48" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="48" y="57" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="57" y="57" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="66" y="57" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="48" y="66" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="57" y="66" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="66" y="66" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="34" y="8" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="34" y="18" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="34" y="28" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="8" y="34" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="18" y="34" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="28" y="34" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="38" y="34" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="48" y="34" width="6" height="6" fill="#8BC53F" rx="1"/>
                <rect x="58" y="34" width="6" height="6" fill="#1A4D3A" rx="1"/>
                <rect x="68" y="34" width="6" height="6" fill="#8BC53F" rx="1"/>
              </svg>
            </div>
            <div class="qr-text">
              <h5>Scan to Verify Origin</h5>
              <p>Batch #CO-2026-014 · Forastero Cocoa · Kole District · Certified sustainable origin</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ TRACEABILITY DEEP DIVE ═══════════════════════════════════ -->
<section id="traceability">
  <div class="container">
    <div class="reveal" style="max-width:680px;">
      <p class="label">Traceability</p>
      <h2 class="display display-white" style="margin-bottom:1rem;">From seed to sale.<br>Every step verified.</h2>
      <p class="body-lg body-lg-white">Uganda's coffee and cocoa sectors need proof of sustainable origin. Nurseryz.io makes that possible — connecting the nursery bed to international buyers with a simple QR scan.</p>
    </div>
    <div class="trace-3col">
      <div class="trace-card reveal d1">
        <div class="trace-card-icon">🔍</div>
        <h3>Full Chain Visibility</h3>
        <p>Every seedling batch is registered with origin, variety, nursery, and handling history. Nothing is anonymous. Everything is auditable.</p>
      </div>
      <div class="trace-card reveal d2">
        <div class="trace-card-icon">🏆</div>
        <h3>Quality Assurance</h3>
        <p>Buyers verify that farmers followed best practice advisory — proving sustainable and responsible cultivation for premium market access.</p>
      </div>
      <div class="trace-card reveal d3">
        <div class="trace-card-icon">🎓</div>
        <h3>Research & Education</h3>
        <p>Aggregated data powers Uganda's agricultural research institutions and supports government policy on agroforestry adoption and income growth.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ IMPACT ════════════════════════════════════════════════════ -->
<section id="impact">
  <div class="container">
    <div class="reveal" style="text-align:center;max-width:600px;margin:0 auto;">
      <p class="label" style="justify-content:center">Our Impact Goal</p>
      <h2 class="display" style="margin-bottom:1rem;">Built for Uganda's 10× economy</h2>
      <p class="body-lg" style="margin:0 auto;text-align:center;">Government, NGOs and the private sector are pushing Uganda towards a $500 billion agri-economy. Nurseryz.io is the connective tissue that makes it possible.</p>
    </div>
    <div class="impact-grid reveal d1">
      <div class="impact-cell"><div class="big">10<span>K+</span></div><p>Farmers reached through advisory programmes</p></div>
      <div class="impact-cell"><div class="big">3<span>×</span></div><p>Seedling survival rate improvement with guided care</p></div>
      <div class="impact-cell"><div class="big">5<span>B</span></div><p>Uganda's target agri-economy — UGX equivalent</p></div>
      <div class="impact-cell"><div class="big">0<span>G</span></div><p>Works on basic feature phones — zero data needed for SMS</p></div>
    </div>
  </div>
</section>

<!-- ═══ CTA ═══════════════════════════════════════════════════════ -->
<section id="cta">
  <div class="container">
    <div class="reveal">
      <p class="label" style="justify-content:center;color:var(--lime)">Ready to Start</p>
      <h2 class="display display-white" style="max-width:680px;margin:0 auto 1rem;">Join Uganda's smarter agroforestry movement.</h2>
      <p class="body-lg body-lg-white" style="max-width:480px;margin:0 auto 3rem;">Whether you run a nursery bed, grow coffee in Northern Uganda, or buy produce for export — Nurseryz.io has a role for you.</p>
      <div class="cta-actions">
        <a href="/register" class="btn-lime">Register Your Nursery →</a>
        <a href="/admin" class="btn-white">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
          Owner Login
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FOOTER ════════════════════════════════════════════════════ -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand-col">
      <a href="#" class="brand">Nurseryz<span>.io</span></a>
      <p>Uganda's platform for smarter agroforestry — connecting nursery owners, farmers, buyers and government.</p>
    </div>
    <div class="footer-links-col">
      <h4>Platform</h4>
      <ul>
        <li><a href="#solution">How It Works</a></li>
        <li><a href="#audiences">For Owners</a></li>
        <li><a href="#audiences">For Farmers</a></li>
        <li><a href="#traceability">Traceability</a></li>
      </ul>
    </div>
    <div class="footer-links-col">
      <h4>Crops</h4>
      <ul>
        <li><a href="#">Coffee Advisory</a></li>
        <li><a href="#">Cocoa Advisory</a></li>
        <li><a href="#">Fruit Trees</a></li>
        <li><a href="#">Timber & Shade</a></li>
      </ul>
    </div>
    <div class="footer-links-col">
      <h4>Account</h4>
      <ul>
        <li><a href="/admin">Owner Login</a></li>
        <li><a href="/register">Register on Nurseryz.io</a></li>
        <li><a href="#">SMS Enrolment</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 Nurseryz.io · Empowering Uganda's Agroforestry Future</p>
    <p>Built for smallholders. Trusted by buyers. Backed by data.</p>
  </div>
</footer>

<script>
  // Nav scroll
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => nav.classList.toggle('solid', scrollY > 50));

  // Reveal
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); } });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  // Tabs
  function showTab(id, btn) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + id).classList.add('active');
    btn.classList.add('active');
  }
</script>
</body>
</html>