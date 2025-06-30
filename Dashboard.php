<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Home</title>
    <meta name="viewport" content="width=1200">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f2f5;
        }
        /* Top Navigation */
        .top-nav {
            display: flex;
            align-items: center;
            background: #fff;
            height: 56px;
            border-bottom: 1px solid #dddfe2;
            position: sticky;
            top: 0;
            z-index: 10;
            padding: 0 16px;
        }
        .top-nav .search-bar {
            flex: 1;
            display: flex;
            align-items: center;
        }
        .top-nav .search-bar input {
            background: #f0f2f5;
            border: none;
            border-radius: 24px;
            padding: 8px 16px;
            font-size: 15px;
            width: 260px;
            margin-left: 8px;
        }
        .top-nav .center-icons {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            gap: 48px;
        }
        
        
        .top-nav .center-icons .icon.active {
            border-bottom: 3px solid #0866ff;
            background: #f0f2f5;
        }
     
        
        
        
        .top-nav .right-icons {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .top-nav .right-icons .icon-btn {
            width: 40px;
            height: 40px;
            background: #e4e6eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .top-nav .right-icons .icon-btn svg {
            width: 22px;
            height: 22px;
            fill: #050505;
        }
        /* Layout */
        .container {
            display: flex;
            max-width: 1400px;
            margin: 0 auto;
            margin-top: 16px;
        }
        /* Sidebar */
        .sidebar {
            width: 320px;
            min-width: 260px;
            max-width: 360px;
            padding-right: 8px;
        }
        .sidebar .sidebar-list {
            margin-top: 12px;
        }
        .sidebar .sidebar-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 17px;
            color: #050505;
            gap: 16px;
        }
        .sidebar .sidebar-item:hover {
            background: #e4e6eb;
        }
        .sidebar .sidebar-item img,
        .sidebar .sidebar-item .sidebar-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #d8d8d8;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar .sidebar-item .sidebar-icon svg {
            width: 24px;
            height: 24px;
        }
        /* Main Content */
        .main-content {
            flex: 1;
            max-width: 600px;
            min-width: 500px;
        }
        .create-post {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            margin-bottom: 16px;
            padding: 16px 0 8px 0;
        }
        .create-post .input-row {
            display: flex;
            align-items: center;
            padding: 0 16px 12px 16px;
        }
        .create-post .input-row img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .create-post .input-row input {
            flex: 1;
            background: #f0f2f5;
            border: none;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 16px;
        }
        .create-post .actions {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #dddfe2;
            padding: 8px 16px 0 16px;
        }
        .create-post .actions .action-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #65676b;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            flex: 1;
            justify-content: center;
            padding: 8px 0;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .create-post .actions .action-btn:hover {
            background: #f0f2f5;
        }
        .create-post .actions .action-btn svg {
            width: 22px;
            height: 22px;
        }
        /* Create Story */
        .create-story {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 16px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .create-story .plus-btn {
            background: #e7f3ff;
            color: #0866ff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 10px;
        }
        .create-story .story-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .create-story .story-text span:first-child {
            font-weight: 600;
            font-size: 16px;
            color: #050505;
        }
        .create-story .story-text span:last-child {
            font-size: 14px;
            color: #65676b;
        }
        /* Feed Post */
        .feed-post {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 16px;
            padding: 16px;
        }
        .feed-post .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        .feed-post .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .feed-post .post-header .post-info {
            font-size: 14px;
        }
        .feed-post .post-header .post-info strong {
            font-weight: 600;
        }
        .feed-post .post-header .post-info span {
            color: #65676b;
            font-size: 13px;
        }
        .feed-post .post-content {
            margin-bottom: 8px;
            font-size: 15px;
            color: #050505;
        }
        .feed-post .post-content a {
            color: #0866ff;
            text-decoration: none;
        }
        .feed-post .post-image {
            width: 100%;
            border-radius: 8px;
            margin-top: 8px;
        }
        /* Right Sidebar */
        .right-sidebar {
            width: 320px;
            min-width: 260px;
            max-width: 360px;
            padding-left: 8px;
        }
        .right-sidebar .section {
            background: none;
            margin-bottom: 24px;
        }
        .right-sidebar .section-title {
            font-size: 15px;
            font-weight: 600;
            color: #65676b;
            margin-bottom: 8px;
        }
        .right-sidebar .ad-hidden {
            font-size: 15px;
            color: #65676b;
            margin-bottom: 8px;
        }
        .right-sidebar .ad-hidden a {
            color: #0866ff;
            font-size: 15px;
            text-decoration: none;
            margin-left: 4px;
        }
        .right-sidebar .contacts-list {
            margin-bottom: 16px;
        }
        .right-sidebar .contact {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }
        .right-sidebar .contact img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
        .right-sidebar .contact span {
            font-size: 15px;
            color: #050505;
        }
        .right-sidebar .group-chats {
            margin-top: 8px;
        }
        .right-sidebar .group-chats .create-group-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #0866ff;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        .right-sidebar .group-chats .create-group-btn svg {
            width: 22px;
            height: 22px;
        }
        /* Responsive */
       .post-action-btn img {
  width: 18px;
  height: 18px;
  object-fit: contain;
  display: inline-block;
}


    </style>
</head>
<body>
    <!-- Top Navigation -->
    <div class="top-nav">
        <div class="search-bar">
           <img src="images/search.svg" alt="Search-bar" width="24" height="24">
            <input type="text" placeholder="Search Facebook">
</div>
        <div class="center-icons">
            <div class="icon active" title="Home">
    <img src="images/home.svg" alt="Home Icon" width="24" height="24">
</div>

            <div class="icon" title="Friends">
    <img src="images/users.svg" alt="Friends Icon" width="24" height="24">
</div>

            <div class="icon" title="video">
               <img src="images/video.svg" alt="video" width="24" height="24">
</div>
            <div class="icon" title="Marketplace">
              <img src="images/market.svg" alt="Marketplace" width="24" height="24">
</div>
        </div>
        <div class="right-icons">
            <div class="icon-btn" title="Menu">
               <img src="images/Menue.svg" alt="Menu" width="24" height="24">
</div>
            <div class="icon-btn" title="Messenger">
                <img src="images/message.png" alt="Messenger" width="24" height="24">
</div>
            <div class="icon-btn" title="Notifications">
               <img src="images/bell-solid.svg" alt="Notifications" width="24" height="24">
</div>
            <div class="icon-btn" title="Account">
              <img src="images/cocojones.jpeg" alt="Account" width="24" height="24">
</div>
        </div>
    </div>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-list">
                <div class="sidebar-item">
                    <img src="images/cocojones.jpeg" alt="Tidjani Islamiath">
                    <span>Tidjani Islamiath</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:linear-gradient(135deg,#7f53ac,#657ced);">
                        <svg viewBox="0 0 24 24" fill="#fff"><circle cx="12" cy="12" r="10"/></svg>
                    </span>
                    <span>Meta AI</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e7f3ff;">
                        <svg viewBox="0 0 24 24" fill="#1877f2"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"/></svg>
                    </span>
                    <span>Friends</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e4e6eb;">
                        <img src="images/clock-solid.svg" alt="Friends Icon" width="18" height="24">
                    </span>
                    <span>Memories</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#f7f7fa;">
                        <svg viewBox="0 0 24 24" fill="#a05dff"><path d="M6 2h9a2 2 0 0 1 2 2v16l-6-3-6 3V4a2 2 0 0 1 2-2z"/></svg>
                    </span>
                    <span>Saved</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e7f3ff;">
                       <img src="images/users.svg" alt="Friends Icon" width="18" height="24">
                    </span>
                    <span>Groups</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#f7f7fa;">
                      <div class="x9f619 x1ja2u2z x78zum5 x2lah0s x1n2onr6 x1qughib x6s0dn4 xozqiw3 x1q0g3np"><div class="x9f619 x1n2onr6 x1ja2u2z xdt5ytf x2lah0s x193iq5w xeuugli xamitd3 x78zum5"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli xamitd3 x1icxu4v x25sj25 x10b6aqq x1yrsyyn"><i data-visualcompletion="css-img" class="" style="background-image:url('https://static.xx.fbcdn.net/rsrc.php/v4/yH/r/i2HLlWiS1Fa.png?_nc_eui2=AeEvxZWbMUVUD9pwXcSb_TotGiFyLgYa3yAaIXIuBhrfIMDv6OBPxhXGAQVXOm3hVYaYbR9uxUgpqrGqOl6id5n3');background-position:0 -518px;background-size:auto;width:36px;height:36px;background-repeat:no-repeat;display:inline-block"></i></div></div><div class="x9f619 x1ja2u2z x78zum5 x1n2onr6 x1iyjqo2 xs83m0k xeuugli x1qughib x6s0dn4 x1a02dak x1q0g3np xdl72j9"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli x1iyjqo2"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli x1icxu4v x25sj25 x10b6aqq x1yrsyyn"><div class="x78zum5 xdt5ytf xz62fqu x16ldp7u"><div class="xu06os2 x1ok221b"><span class="x193iq5w xeuugli x13faqbe x1vvkbs x1xmvt09 x1lliihq x1s928wv xhkezso x1gmr53x x1cpjm7i x1fgarty x1943h6x xudqn12 x3x7a5m x6prxxf xvq8zen xk50ysn xzsf02u x1yc453h" dir="auto"><span class="x1lliihq x6ikm8r x10wlt62 x1n2onr6" style="-webkit-box-orient:vertical;-webkit-line-clamp:2;display:-webkit-box"></span></span></div></div></div></div></div></div>
                    </span>
                    <span>Reels</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e4e6eb;">
                      <img src="images/store.svg" alt="Sidebar-icon" width="18" height="24">
                    
                    </span>
                    <span>Marketplace</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e7f3ff;">
                       <span class="x1lliihq x6ikm8r x10wlt62 x1n2onr6" style="-webkit-box-orient:vertical;-webkit-line-clamp:2;display:-webkit-box">

                       </span>
                    </span>
                    <span>Feeds</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e4e6eb;">
                        <img src="images/calender.svg" alt="Sidebar-icon" width="18" height="24">
                    
                    </span>
                    <span>Events</span>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <div class="create-post">
                <div class="input-row">
                    <img src="images/cocojones.jpeg" alt="Tidjani Islamiath">
                    <input type="text" placeholder="What's on your mind, Tidjani?">
                </div>
                <div class="actions">
                    <div class="action-btn">
                         <img src="images/videoh.svg" alt="action-btn" width="24" height="24">
                        Live video
                    </div>
                    <div class="action-btn">
                        <span style="display: flex; align-items: center;">
  <svg width="24" height="24" viewBox="0 0 32 32" fill="none">
    <rect x="6" y="6" width="20" height="20" rx="4" fill="#45bd62"/>
    <rect x="4" y="4" width="20" height="20" rx="4" fill="#45bd62"/>
    <path d="M6 20L12 14L16 18L20 12L22 20H6Z" fill="white"/>
    <circle cx="10" cy="10" r="2" fill="white"/>
  </svg>
  
</span>

                        Photo/video
                    </div>
                    <div class="action-btn">
                        <svg viewBox="0 0 24 24" fill="#f7b928"><circle cx="12" cy="12" r="10"/><path d="M8 15c1.5-2 6.5-2 8 0" stroke="#fff" stroke-width="2" fill="none"/><circle cx="9" cy="10" r="1" fill="#fff"/><circle cx="15" cy="10" r="1" fill="#fff"/></svg>
                        Feeling/activity
                    </div>
                </div>
            </div>
            <div class="create-story">
                <div class="plus-btn">
                    <svg viewBox="0 0 24 24" width="24" height="24" fill="#0866ff"><circle cx="12" cy="12" r="20" fill="#e7f3ff"/><path d="M12 8v8M8 12h8" stroke="#0866ff" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <div class="story-text">
                    <span>Create story</span>
                    <span>Share a photo or write something.</span>
                </div>
            </div>
            <div class="feed-post">
                <div class="post-header">
                    <img src="images/Ivy.jpg" alt="Movies Fans Worldwide">
                    <div class="post-info">
                   <strong>Movies Fans Worldwide</strong> · <button class="follow-btn">Follow</button>

                        <span>20 June at 14:17 · <svg width="12" height="12" fill="#65676b" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/></svg></span>
                    </div>
                </div>
                <div class="post-content">
                    Walk Alone<br>
                    👉Click here: <a href="#">https://movie.WalkAlone.com/11167/</a>
                </div>
                <img class="post-image" src="images/movie.webp" alt="Walk Alone">
            </div><div class="post-actions">
  
</div>

        </div
        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <div class="section">
                <div class="section-title">Sponsored</div>
                <div class="ad-hidden">Ad hidden<br>
                    <span style="font-size:13px;">You won't see this ad and ads like it.<a href="#">Undo</a></span>
                </div>
                <div class="ad-hidden">Ad hidden<br>
                    <span style="font-size:13px;">You won't see this ad and ads like it.<a href="#">Undo</a></span>
                </div>
            </div>
            <div class="section">
                <div class="section-title">Contacts</div>
                <div class="contacts-list">
                    <div class="contact">
                        <img src="images/Football.jpg" alt="Iqbal Tidjani">
                        <span>Iqbal Tidjani</span>
                    </div>
                </div>
            </div>
            <div class="section group-chats">
                <div class="section-title">Group chats</div>
                <button class="create-group-btn">
                    <svg viewBox="0 0 24 24" fill="#0866ff"><circle cx="12" cy="12" r="10" fill="#e7f3ff"/><path d="M12 8v8M8 12h8" stroke="#0866ff" stroke-width="2" stroke-linecap="round"/></svg>
                    Create group chat
                </button>
            </div>
            
        </div>
    </div>
</body>
</html>
