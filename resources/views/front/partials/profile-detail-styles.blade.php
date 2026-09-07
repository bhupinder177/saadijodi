<style>
	.sj-profile-page{background:#f4f6fb;padding:28px 0 56px;font-family:'Poppins',sans-serif;}
	.sj-profile-page .container{max-width:1180px;}
	.sj-pcard{background:#fff;border:1px solid #eceef3;border-radius:16px;box-shadow:0 6px 24px rgba(20,33,61,.05);}

	/* hero */
	.sj-hero{display:flex;gap:24px;padding:22px;margin-bottom:24px;}
	@media(max-width:860px){.sj-hero{flex-direction:column;}}
	.sj-hero-photo{flex:0 0 240px;position:relative;border-radius:14px;overflow:hidden;height:240px;background:#eef1f7;}
	@media(max-width:860px){.sj-hero-photo{flex:0 0 auto;width:100%;height:260px;}}
	.sj-hero-photo img{width:100%;height:100%;object-fit:cover;display:block;}
	.sj-hero-photo .sj-initials{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:74px;font-weight:700;color:#fff;letter-spacing:3px;}
	.sj-hero-photo .sj-photocount{position:absolute;left:12px;bottom:12px;background:rgba(20,33,61,.72);color:#fff;font-size:11px;font-weight:600;padding:4px 10px;border-radius:20px;display:inline-flex;align-items:center;gap:5px;}
	.sj-hero-nav{position:absolute;top:50%;transform:translateY(-50%);width:30px;height:30px;border-radius:50%;background:rgba(255,255,255,.9);border:none;color:#14213d;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 2px 8px rgba(0,0,0,.15);}
	.sj-hero-nav.prev{left:8px;} .sj-hero-nav.next{right:8px;}

	.sj-hero-body{flex:1;min-width:0;}
	.sj-hero-top{display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap;}
	.sj-hero-name{font-size:22px;font-weight:600;color:#14213d;margin:0;display:flex;align-items:center;gap:8px;}
	.sj-hero-name .sj-verified{color:#1bbf83;font-size:17px;}
	.sj-hero-meta{display:flex;align-items:center;gap:16px;margin:8px 0 14px;font-size:13px;flex-wrap:wrap;}
	.sj-hero-meta .sj-online{color:#1bbf83;font-weight:500;display:inline-flex;align-items:center;gap:6px;}
	.sj-hero-meta .sj-online:before{content:"";width:8px;height:8px;border-radius:50%;background:#1bbf83;display:inline-block;}
	.sj-hero-meta .sj-youher{color:#3d5cff;font-weight:500;display:inline-flex;align-items:center;gap:6px;}
	.sj-hero-facts{border-top:1px solid #eef0f4;padding-top:14px;display:grid;grid-template-columns:1fr 1fr;gap:10px 24px;}
	@media(max-width:560px){.sj-hero-facts{grid-template-columns:1fr;}}
	.sj-hero-facts span{display:flex;align-items:center;gap:9px;font-size:13px;color:#4a5063;}
	.sj-hero-facts span i{width:15px;text-align:center;color:#9aa1b4;}

	.sj-hero-actions{display:flex;flex-direction:column;gap:10px;flex:0 0 190px;}
	@media(max-width:860px){.sj-hero-actions{flex:0 0 auto;flex-direction:row;flex-wrap:wrap;}}
	.sj-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:10px;font-size:13.5px;font-weight:600;padding:11px 16px;text-decoration:none;cursor:pointer;border:1px solid transparent;transition:filter .15s,background .15s;white-space:nowrap;}
	.sj-btn-primary{background:#1c53d6;color:#fff;box-shadow:0 8px 18px rgba(28,83,214,.28);}
	.sj-btn-primary:hover{filter:brightness(1.07);color:#fff;text-decoration:none;}
	.sj-btn-ghost{background:#fff;color:#3a4256;border-color:#e2e5ee;}
	.sj-btn-ghost:hover{border-color:#1c53d6;color:#1c53d6;text-decoration:none;}
	.sj-btn-danger-ghost{background:#fff;color:#d7263d;border-color:#f3c9cf;}
	.sj-btn-danger-ghost:hover{background:#fff5f6;color:#d7263d;text-decoration:none;}

	/* layout */
	.sj-grid{display:grid;grid-template-columns:300px 1fr;gap:24px;align-items:start;}
	@media(max-width:991px){.sj-grid{grid-template-columns:1fr;}}
	.sj-aside{display:flex;flex-direction:column;gap:20px;position:sticky;top:20px;}
	@media(max-width:991px){.sj-aside{position:static;}}
	.sj-aside-card{padding:20px;}
	.sj-aside-card .sj-aside-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;}
	.sj-aside-card h4{font-size:15px;font-weight:600;color:#3d5cff;margin:0;}
	.sj-aside-card .sj-viewall{font-size:12.5px;color:#3d5cff;text-decoration:none;font-weight:500;}

	.sj-photo-main{width:100%;height:180px;border-radius:12px;object-fit:cover;display:block;margin-bottom:10px;background:#eef1f7;}
	.sj-photo-main.sj-initials-box{display:flex;align-items:center;justify-content:center;font-size:52px;font-weight:700;color:#fff;letter-spacing:2px;}
	.sj-photo-thumbs{display:grid;grid-template-columns:1fr 1fr;gap:10px;}
	.sj-photo-thumbs img{width:100%;height:78px;border-radius:10px;object-fit:cover;}

	.sj-qa{list-style:none;padding:0;margin:0;}
	.sj-qa li{margin-bottom:4px;}
	.sj-qa a{display:flex;align-items:center;gap:12px;padding:9px 8px;border-radius:9px;font-size:13.5px;color:#3a4256;text-decoration:none;transition:background .12s;cursor:pointer;}
	.sj-qa a:hover{background:#f3f5fb;color:#1c53d6;}
	.sj-qa a i{width:18px;text-align:center;color:#3d5cff;font-size:14px;}
	.sj-qa a.danger i{color:#d7263d;}
	.sj-qa a.danger:hover{color:#d7263d;}

	.sj-vis h4{color:#3d5cff;font-size:15px;font-weight:600;margin:0 0 8px;}
	.sj-vis p{font-size:12.5px;color:#6b7183;margin:0 0 4px;}
	.sj-vis .sj-vis-tag{color:#1bbf83;font-weight:600;font-size:13px;}
	.sj-vis .sj-btn{width:100%;margin-top:14px;}

	/* detailed profile */
	.sj-detail{padding:6px 26px 26px;}
	.sj-detail-title{font-size:18px;font-weight:600;color:#14213d;padding:20px 0 14px;position:relative;margin:0;}
	.sj-detail-title:after{content:"";position:absolute;left:0;bottom:6px;width:52px;height:3px;border-radius:3px;background:#e5006d;}
	.sj-sec{padding:22px 0;border-top:1px solid #eef0f4;}
	.sj-sec:first-of-type{border-top:none;}
	.sj-sec-head{display:flex;align-items:center;gap:12px;margin-bottom:14px;}
	.sj-sec-ico{width:36px;height:36px;border-radius:50%;border:1.5px solid #ffd7e6;background:#fff5f9;color:#e5006d;display:flex;align-items:center;justify-content:center;font-size:15px;flex:0 0 auto;}
	.sj-sec-head h3{font-size:15.5px;font-weight:600;color:#e5006d;margin:0;flex:1;}
	.sj-sec-edit{font-size:12.5px;color:#3d5cff;text-decoration:none;font-weight:500;display:inline-flex;align-items:center;gap:5px;}
	.sj-sec-edit:hover{text-decoration:none;color:#2740d8;}
	.sj-sec-sub{font-size:12px;color:#9aa1b4;margin:0 0 10px 48px;}
	.sj-sec-body{margin-left:48px;}
	@media(max-width:560px){.sj-sec-sub,.sj-sec-body{margin-left:0;}}
	.sj-sec-text{font-size:13px;color:#5a6072;line-height:1.7;margin:0;}
	.sj-kv{display:grid;grid-template-columns:1fr 1fr;gap:16px 28px;}
	@media(max-width:560px){.sj-kv{grid-template-columns:1fr;}}
	.sj-kv .sj-k{font-size:11.5px;color:#9aa1b4;margin:0 0 2px;text-transform:uppercase;letter-spacing:.3px;}
	.sj-kv .sj-v{font-size:13.5px;color:#2b3040;margin:0;font-weight:500;}
	.sj-locked{font-size:13px;color:#6b7183;line-height:1.7;margin:0;}
	.sj-locked a{color:#3d5cff;font-weight:600;text-decoration:none;}
</style>
