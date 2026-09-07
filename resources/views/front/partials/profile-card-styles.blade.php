<style>
	.sj-listing{background:#f4f6fb;padding:32px 0 56px;font-family:'Poppins',sans-serif;}
	.sj-listing .container{max-width:1200px;}
	.sj-row{display:flex;flex-wrap:wrap;gap:24px;align-items:flex-start;}
	.sj-side{flex:0 0 300px;max-width:300px;}
	.sj-main{flex:1;min-width:0;}
	@media(max-width:991px){.sj-side{flex:0 0 100%;max-width:100%;}}

	/* ---------- cards / panels ---------- */
	.sj-card{background:#fff;border:1px solid #eceef3;border-radius:16px;box-shadow:0 6px 24px rgba(20,33,61,.05);}
	.sj-filter{padding:22px;position:sticky;top:20px;}
	.sj-filter h3{font-size:17px;font-weight:600;margin:0 0 4px;color:#14213d;display:flex;align-items:center;gap:8px;}
	.sj-filter h3 i{color:#e5006d;}
	.sj-filter .sj-sub{font-size:12px;color:#8b93a7;margin:0 0 18px;}
	.sj-field{margin-bottom:14px;}
	.sj-field > label{display:block;font-size:12px;font-weight:600;color:#4a5063;margin-bottom:6px;}
	.sj-field select,.sj-sort select{
		width:100%;appearance:none;-webkit-appearance:none;
		border:1px solid #e2e5ee;border-radius:10px;background:#fff;
		padding:10px 34px 10px 12px;font-size:13px;color:#2b3040;cursor:pointer;
		background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%238b93a7' d='M6 8L0 2l1.4-1.4L6 5.2 10.6.6 12 2z'/%3E%3C/svg%3E");
		background-repeat:no-repeat;background-position:right 12px center;
	}
	.sj-field select:focus,.sj-sort select:focus{outline:none;border-color:#e5006d;box-shadow:0 0 0 3px rgba(229,0,109,.12);}

	.sj-slider-wrap{padding:6px 4px 0;}
	.sj-listing #slider-range.ui-slider{height:5px;background:#e7e9f1;border:none;border-radius:6px;margin:8px 0 10px;}
	.sj-listing #slider-range .ui-slider-range{background:#3d5cff;border-radius:6px;}
	.sj-listing #slider-range .ui-slider-handle{
		width:16px;height:16px;top:-6px;border-radius:50%;background:#3d5cff;border:3px solid #fff;
		box-shadow:0 2px 6px rgba(61,92,255,.45);cursor:pointer;margin-left:-8px;
	}
	.sj-range-labels{display:flex;justify-content:space-between;font-size:11px;color:#8b93a7;}

	.sj-more-toggle{
		width:100%;display:flex;justify-content:space-between;align-items:center;
		border:1px solid #e2e5ee;border-radius:10px;background:#fff;padding:10px 12px;
		font-size:13px;font-weight:600;color:#2b3040;cursor:pointer;margin-bottom:14px;
	}
	.sj-more-toggle i{transition:transform .2s;color:#8b93a7;}
	.sj-more-toggle.open i{transform:rotate(180deg);}
	.sj-more-panel{display:none;}
	.sj-more-panel.open{display:block;}

	.sj-btn-search{
		width:100%;border:none;border-radius:10px;padding:11px 0;font-size:14px;font-weight:600;color:#fff;
		background:linear-gradient(90deg,#e5006d,#7b2ff7);cursor:pointer;margin-bottom:10px;
		box-shadow:0 8px 20px rgba(123,47,247,.28);transition:filter .15s;
	}
	.sj-btn-search:hover{filter:brightness(1.05);}
	.sj-btn-search i{margin-right:6px;}
	.sj-btn-reset{
		display:block;width:100%;text-align:center;border:1px solid #e2e5ee;border-radius:10px;
		padding:10px 0;font-size:13px;font-weight:600;color:#4a5063;background:#fff;text-decoration:none;
	}
	.sj-btn-reset:hover{color:#e5006d;border-color:#e5006d;text-decoration:none;}

	/* ---------- promo cards ---------- */
	.sj-promo{margin-top:20px;padding:20px;border-radius:16px;background:linear-gradient(160deg,#eef1ff,#f7f2ff);border:1px solid #e6e9fb;}
	.sj-promo h4{font-size:15px;font-weight:600;color:#14213d;margin:0 0 12px;display:flex;align-items:center;gap:8px;}
	.sj-promo h4 i{color:#f0a500;}
	.sj-promo ul{list-style:none;padding:0;margin:0 0 16px;}
	.sj-promo ul li{position:relative;padding-left:18px;font-size:12.5px;color:#4a5063;margin-bottom:8px;}
	.sj-promo ul li:before{content:"";position:absolute;left:0;top:7px;width:7px;height:7px;border-radius:50%;background:#7b2ff7;}
	.sj-promo .sj-promo-btn{display:inline-block;background:#3d5cff;color:#fff;font-size:13px;font-weight:600;padding:9px 20px;border-radius:9px;text-decoration:none;box-shadow:0 8px 18px rgba(61,92,255,.3);}

	.sj-safety{margin-top:20px;padding:20px;}
	.sj-safety h4{font-size:15px;font-weight:600;color:#14213d;margin:0 0 12px;display:flex;align-items:center;gap:8px;}
	.sj-safety h4 i{color:#3d5cff;}
	.sj-safety ul{list-style:none;padding:0;margin:0 0 12px;}
	.sj-safety ul li{position:relative;padding-left:24px;font-size:12.5px;color:#4a5063;margin-bottom:9px;}
	.sj-safety ul li i{position:absolute;left:0;top:2px;color:#1bbf83;}
	.sj-safety a{font-size:12.5px;color:#3d5cff;font-weight:500;text-decoration:none;}

	/* ---------- main column ---------- */
	.sj-head{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;padding:18px 22px;margin-bottom:20px;}
	.sj-head h2{font-size:18px;font-weight:600;color:#14213d;margin:0;position:relative;}
	.sj-head h2:after{content:"";position:absolute;left:0;bottom:-8px;width:44px;height:3px;border-radius:3px;background:#e5006d;}
	.sj-sort{display:flex;align-items:center;gap:8px;font-size:13px;color:#8b93a7;}
	.sj-sort select{width:auto;min-width:150px;}

	.sj-profile{padding:22px;margin-bottom:20px;display:flex;gap:22px;}
	@media(max-width:767px){.sj-profile{flex-direction:column;}}

	.sj-avatar{flex:0 0 148px;position:relative;border-radius:14px;overflow:hidden;height:210px;}
	@media(max-width:767px){.sj-avatar{flex:0 0 auto;width:100%;height:220px;}}
	.sj-avatar img{width:100%;height:100%;object-fit:cover;display:block;}
	.sj-avatar .sj-initials{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:52px;font-weight:700;color:#fff;letter-spacing:2px;}
	.sj-badge-new{position:absolute;top:10px;left:10px;background:#1bbf83;color:#fff;font-size:10px;font-weight:600;padding:4px 9px;border-radius:20px;}
	.sj-badge-photos{position:absolute;bottom:10px;right:10px;background:rgba(20,33,61,.72);color:#fff;font-size:11px;font-weight:600;padding:3px 8px;border-radius:20px;display:flex;align-items:center;gap:4px;}

	.sj-info{flex:1;min-width:0;}
	.sj-name-row{display:flex;align-items:flex-start;justify-content:space-between;gap:10px;}
	.sj-name-row h3{font-size:17px;font-weight:600;color:#14213d;margin:0;display:flex;align-items:center;gap:7px;}
	.sj-name-row h3 .sj-verified{color:#1bbf83;font-size:14px;}
	.sj-bookmark{color:#c3c8d6;font-size:17px;background:none;border:none;cursor:pointer;}
	.sj-bookmark:hover{color:#e5006d;}
	.sj-youher{display:inline-flex;align-items:center;gap:6px;font-size:12px;color:#3d5cff;font-weight:500;margin:4px 0 12px;}

	.sj-details{display:grid;grid-template-columns:1fr 1fr;gap:8px 20px;margin-bottom:12px;}
	@media(max-width:520px){.sj-details{grid-template-columns:1fr;}}
	.sj-details span{display:flex;align-items:center;gap:8px;font-size:12.5px;color:#4a5063;}
	.sj-details span i{width:15px;text-align:center;color:#9aa1b4;}
	.sj-bio{font-size:12.5px;color:#6b7183;line-height:1.6;margin:0;}
	.sj-bio a{color:#3d5cff;font-weight:500;text-decoration:none;margin-left:4px;}

	.sj-actions{flex:0 0 130px;border-left:1px solid #eceef3;padding-left:20px;display:flex;flex-direction:column;align-items:center;gap:14px;text-align:center;}
	@media(max-width:767px){.sj-actions{flex:0 0 auto;border-left:none;border-top:1px solid #eceef3;padding-left:0;padding-top:16px;flex-direction:row;justify-content:center;gap:26px;}}
	.sj-actions .sj-act{display:flex;flex-direction:column;align-items:center;gap:5px;font-size:11px;color:#8b93a7;}
	.sj-actions .sj-act p{margin:0;font-size:11px;color:#8b93a7;line-height:1.3;}
	.sj-icon-btn{width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:16px;cursor:pointer;text-decoration:none;transition:transform .12s;}
	.sj-icon-btn:hover{transform:translateY(-2px);text-decoration:none;}
	.sj-chat{background:#e8ecff;color:#3d5cff;}
	.sj-like{background:#ffe3ef;color:#e5006d;}
	.sj-connected-ico{color:#1bbf83;font-size:24px;}
	.sj-connect-now{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#3d5cff;cursor:pointer;text-decoration:none;}
	.sj-connect-now:hover{text-decoration:none;color:#2740d8;}

	.sj-empty{padding:60px 20px;text-align:center;color:#8b93a7;font-size:15px;}
	.sj-listing .pagination{margin-top:8px;}

	/* ---------- connections page ---------- */
	.sj-conn-hero{display:flex;align-items:center;gap:14px;padding:22px;margin-bottom:20px;}
	.sj-conn-hero .sj-conn-ico{width:46px;height:46px;border-radius:12px;background:#e7fbf2;color:#1bbf83;display:flex;align-items:center;justify-content:center;font-size:20px;flex:0 0 auto;}
	.sj-conn-hero h2{font-size:18px;font-weight:600;color:#14213d;margin:0;}
	.sj-conn-hero p{margin:2px 0 0;font-size:12.5px;color:#8b93a7;}
</style>
