<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .top-nav .center-icons .icon {
            padding: 8px 16px;
            border-radius: 8px;
            transition: background 0.2s;
            cursor: pointer;
            height: 40px; /* Ensure consistent height for alignment */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .top-nav .center-icons .icon:hover {
            background: #f0f2f5;
        }

        .top-nav .center-icons .icon.active {
            border-bottom: 3px solid #0866ff;
            background: #e7f3ff; /* Lighter blue for active state */
            border-radius: 0; /* Remove border-radius on bottom for active state */
            padding-bottom: 5px; /* Adjust padding due to border */
        }
        
        .top-nav .center-icons .icon img {
            width: 24px;
            height: 24px;
            object-fit: contain;
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

        .top-nav .right-icons .icon-btn:hover {
            background: #d8d8d8;
        }

        .top-nav .right-icons .icon-btn img {
            width: 24px;
            height: 24px;
            object-fit: cover; /* Use cover for profile pic, contain for others */
            border-radius: 50%; /* For profile picture */
        }

        /* Layout */
        .container {
            display: flex;
            max-width: 1400px; /* Adjusted for overall content width */
            margin: 0 auto;
            margin-top: 16px;
            justify-content: center; /* Center content within container */
            gap: 16px; /* Space between sidebars and main content */
        }

        /* Sidebar */
        .sidebar {
            width: 280px; /* Increased slightly for better fit */
            min-width: 250px;
            max-width: 300px;
            padding-right: 8px;
            position: sticky; /* Make sidebar sticky */
            top: 72px; /* Below the top nav */
            height: calc(100vh - 72px); /* Fill remaining height */
            overflow-y: auto; /* Scrollable sidebar */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
            -ms-overflow-style: none; /* Hide scrollbar for IE and Edge */
        }
        .sidebar::-webkit-scrollbar { /* Hide scrollbar for Webkit */
            display: none;
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

        .sidebar .sidebar-item img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .sidebar .sidebar-item .sidebar-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
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
            flex-grow: 1; /* Allow it to take available space */
            width: 600px; /* Fixed width for the main content block */
            min-width: 500px; /* Ensure it doesn't shrink too much */
            max-width: 600px; /* Limit max width */
        }

        /* Story Section (NEW Facebook-like structure) */
        .story-section {
            margin-bottom: 16px; /* Space below stories */
            background: #fff; /* White background for the entire story strip */
            border-radius: 8px; /* Rounded corners for the strip */
            box-shadow: 0 1px 2px rgba(0,0,0,0.05); /* Subtle shadow */
            padding: 0; /* No padding directly on this, as story-container has it */
        }

        .story-container {
            display: flex;
            gap: 10px; /* Space between story cards */
            overflow-x: auto; /* Enable horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* Smoother scrolling on iOS */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
            -ms-overflow-style: none;  /* Hide scrollbar for IE and Edge */
            padding: 16px; /* Padding inside the scrollable container */
        }

        /* Hide scrollbar for Webkit browsers (Chrome, Safari) */
        .story-container::-webkit-scrollbar {
            display: none;
        }

        .story-card {
            position: relative;
            width: 110px; /* Fixed width for each story card */
            height: 180px; /* Fixed height for each story card */
            border-radius: 12px;
            overflow: hidden;
            background: #d8d8d8;
            flex-shrink: 0; /* IMPORTANT: Prevent cards from shrinking */
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .story-card.create-new-story {
            background: #fff; /* White background for the 'Create Story' card */
            border: 1px solid #dddfe2; /* Border for separation */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end; /* Align content to the bottom */
            padding-bottom: 15px; /* Adjust as needed */
            /* The image for this card is a background for the top part, not full image */
        }
        
        .story-card.create-new-story .story-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 65%; /* Only top part for image */
            object-fit: cover;
            border-bottom: 1px solid #dddfe2; /* Separator for image and create section */
            border-radius: 12px 12px 0 0; /* Only top corners rounded */
        }

        .story-card.create-new-story .icon-circle {
            background: #e7f3ff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto; /* Push to bottom for layout */
            margin-bottom: 10px; /* Space between icon and text */
            z-index: 1; /* Ensure it's above the image if needed */
            border: 3px solid #fff; /* White border to separate from image */
        }

        .story-card.create-new-story .icon-circle svg {
            width: 24px;
            height: 24px;
            fill: #0866ff;
        }

        .story-card.create-new-story .card-text {
            font-weight: 600;
            font-size: 14px;
            color: #050505;
            z-index: 1;
        }

        .story-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .story-overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 6px 8px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
            color: white;
            font-size: 13px;
            font-weight: bold;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
        }

        .story-card .profile-pic-small {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 3px solid #0866ff; /* Blue border for stories */
            object-fit: cover;
            z-index: 2;
        }

        /* Hide the original .create-story div as we're integrating its content */
        .create-story {
            display: none; /* This entire old section should be hidden or removed */
        }

        /* Create Post */
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
            object-fit: cover;
        }

        .create-post .input-row input {
            flex: 1;
            background: #f0f2f5;
            border: none;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 16px;
            outline: none; /* Remove blue outline on focus */
            cursor: pointer; /* Indicate it's clickable for modal */
        }
        
        /* The input field in create-post is clickable to open modal */
        .create-post .input-row input:hover {
            background: #e4e6eb;
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

        .create-post .actions .action-btn img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }
        .create-post .actions .action-btn svg {
            width: 22px;
            height: 22px;
            fill: currentColor; /* Allows SVG fill to be controlled by parent color */
        }
        .create-post .actions .action-btn span {
            display: flex;
            align-items: center;
            height: 22px; /* Ensure vertical alignment */
        }

        /* Feed Post */
        .feed-post {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
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
            object-fit: cover;
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

        .feed-post .post-header .post-info .follow-btn {
            background: none;
            border: none;
            color: #0866ff;
            font-weight: 600;
            cursor: pointer;
            padding: 0 4px;
            font-size: 14px;
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
            height: auto; /* Allow image to scale proportionally */
            border-radius: 8px;
            margin-top: 8px;
            display: block;
        }

        .post-actions {
            display: flex;
            justify-content: space-around;
            padding-top: 8px;
            border-top: 1px solid #dddfe2;
            margin-top: 10px;
        }

        .post-action-btn {
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

        .post-action-btn:hover {
            background: #f0f2f5;
        }

        .post-action-btn img {
            width: 18px;
            height: 18px;
            object-fit: contain;
            display: inline-block;
        }

        /* Right Sidebar */
        .right-sidebar {
            width: 320px;
            min-width: 260px;
            max-width: 360px;
            padding-left: 8px;
            position: sticky; /* Make right sidebar sticky */
            top: 72px; /* Below the top nav */
            height: calc(100vh - 72px); /* Fill remaining height */
            overflow-y: auto; /* Scrollable sidebar */
            scrollbar-width: none; /* Hide scrollbar for Firefox */
            -ms-overflow-style: none; /* Hide scrollbar for IE and Edge */
        }
        .right-sidebar::-webkit-scrollbar { /* Hide scrollbar for Webkit */
            display: none;
        }

        .right-sidebar .section {
            background: none; /* No background for sections themselves */
            margin-bottom: 24px;
        }

        .right-sidebar .section-title {
            font-size: 17px; /* Increased for better visibility */
            font-weight: 600;
            color: #65676b;
            margin-bottom: 12px; /* Increased margin */
            padding-left: 5px; /* Slight padding to align with content */
        }

        .right-sidebar .ad-hidden {
            font-size: 14px; /* Adjusted font size */
            color: #65676b;
            margin-bottom: 8px;
            padding-left: 5px;
        }

        .right-sidebar .ad-hidden a {
            color: #0866ff;
            font-size: 14px;
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
            padding: 8px 5px; /* Added padding for clickable area */
            border-radius: 8px;
            cursor: pointer;
        }
        .right-sidebar .contact:hover {
            background: #e4e6eb;
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
            padding: 8px 5px; /* Added padding */
            width: 100%; /* Make it fill space */
            text-align: left; /* Align text to left */
            border-radius: 8px;
            transition: background 0.2s;
        }

        .right-sidebar .group-chats .create-group-btn:hover {
            background: #e4e6eb;
        }

        .right-sidebar .group-chats .create-group-btn svg {
            width: 22px;
            height: 22px;
            fill: #0866ff; /* Ensure icon color is consistent */
        }

        /* Post Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 500px; /* Slightly wider modal */
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .modal-content h3 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            font-size: 20px;
            color: #050505;
        }

        .close-btn {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #65676b;
            background: #e4e6eb;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .close-btn:hover {
            background: #d8d8d8;
        }

        #postImageInput {
            margin-bottom: 10px;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        #previewPostImage {
            max-width: 100%;
            display: none;
            margin-top: 10px;
            border-radius: 8px;
        }

        #postCaption {
            width: calc(100% - 20px); /* Account for padding */
            padding: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid #dddfe2;
            border-radius: 8px;
            font-size: 16px;
            min-height: 80px;
            resize: vertical;
            outline: none;
        }
        #postCaption:focus {
            border-color: #0866ff;
        }

        #submitPostBtn {
            background: #0866ff;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s;
        }
        #submitPostBtn:hover {
            background: #065ee8;
        }
    </style>
</head>

<body>
    <div class="top-nav">
        <div class="search-bar">
            <img src="images/search.svg" alt="Search-bar" width="24" height="24">
            <input type="text" placeholder="Search Facebook">
        </div>
        <div class="center-icons">
            <div class="icon active" title="Home">
                <img src="images/home.svg" alt="Home Icon">
            </div>
            <div class="icon" title="Friends">
                <img src="images/users.svg" alt="Friends Icon">
            </div>
            <div class="icon" title="Video">
                <img src="images/video.svg" alt="video">
            </div>
            <div class="icon" title="Marketplace">
                <img src="images/market.svg" alt="Marketplace">
            </div>
        </div>
        <div class="right-icons">
            <div class="icon-btn" title="Menu">
                <img src="images/Menue.svg" alt="Menu">
            </div>
            <div class="icon-btn" title="Messenger">
                <img src="images/message.png" alt="Messenger">
            </div>
            <div class="icon-btn" title="Notifications">
                <img src="images/bell-solid.svg" alt="Notifications">
            </div>
            <div class="icon-btn" title="Account">
                <img src="images/cocojones.jpeg" alt="Account">
            </div>
        </div>
    </div>

    <div class="container">
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
                        <img src="images/clock-solid.svg" alt="Memories Icon">
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
                        <img src="images/users.svg" alt="Groups Icon">
                    </span>
                    <span>Groups</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#f7f7fa;">
                        <div class="x9f619 x1ja2u2z x78zum5 x2lah0s x1n2onr6 x1qughib x6s0dn4 xozqiw3 x1q0g3np"><div class="x9f619 x1n2onr6 x1ja2u2z xdt5ytf x2lah0s x193iq5w xeuugli xamitd3 x78zum5"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli x1icxu4v x25sj25 x10b6aqq x1yrsyyn"><i data-visualcompletion="css-img" class="" style="background-image:url('https://static.xx.fbcdn.net/rsrc.php/v4/yH/r/i2HLlWiS1Fa.png?_nc_eui2=AeEvxZWbMUVUD9pwXcSb_TotGiFyLgYa3yAaIXIuBhrfIMDv6OBPxhXGAQVXOm3hVYaYbR9uxUgpqrGqOl6id5n3');background-position:0 -518px;background-size:auto;width:36px;height:36px;background-repeat:no-repeat;display:inline-block"></i></div></div><div class="x9f619 x1ja2u2z x78zum5 x1n2onr6 x1iyjqo2 xs83m0k xeuugli x1qughib x6s0dn4 x1a02dak x1q0g3np xdl72j9"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli x1iyjqo2"><div class="x9f619 x1n2onr6 x1ja2u2z x78zum5 xdt5ytf x2lah0s x193iq5w xeuugli x1icxu4v x25sj25 x10b6aqq x1yrsyyn"><div class="x78zum5 xdt5ytf xz62fqu x16ldp7u"><div class="xu06os2 x1ok221b"><span class="x193iq5w xeuugli x13faqbe x1vvkbs x1xmvt09 x1lliihq x1s928wv xhkezso x1gmr53x x1cpjm7i x1fgarty x1943h6x xudqn12 x3x7a5m x6prxxf xvq8zen xk50ysn xzsf02u x1yc453h" dir="auto"><span class="x1lliihq x6ikm8r x10wlt62 x1n2onr6" style="-webkit-box-orient:vertical;-webkit-line-clamp:2;display:-webkit-box"></span></span></div></div></div></div></div></div>
                    </span>
                    <span>Reels</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e4e6eb;">
                        <img src="images/store.svg" alt="Marketplace Icon">
                    </span>
                    <span>Marketplace</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e7f3ff;">
                        <img src="images/newspaper-solid.svg" alt="Feeds Icon"> </span>
                    <span>Feeds</span>
                </div>
                <div class="sidebar-item">
                    <span class="sidebar-icon" style="background:#e4e6eb;">
                        <img src="images/calender.svg" alt="Events Icon">
                    </span>
                    <span>Events</span>
                </div>
            </div>
        </div>

        <div class="main-content">
            
            <div class="story-section">
                <a href="story.php" style="text-decoration:none;">
                <div id="storyContainer" class="story-container">
                    <div class="story-card create-new-story">
                        <img src="images/cocojones.jpeg" class="story-image" alt="Create New Story Background">
                        <div class="icon-circle">
                            <svg viewBox="0 0 24 24" width="24" height="24" fill="#0866ff"><path d="M12 8v8M8 12h8" stroke="#0866ff" stroke-width="2" stroke-linecap="round"/></svg>
                        </div>
                        
                            <span class="card-text">Create Story</span>
                        </a>
                    </div>
                    </div>
            </div>
            <div class="create-post">
                <div class="input-row">
                    <img src="images/cocojones.jpeg" alt="Tidjani Islamiath">
                    <input type="text" placeholder="What's on your mind, Tidjani?" id="openPostModal">
                </div>
                <div class="actions">
                    <div class="action-btn">
                        <img src="images/videoh.svg" alt="Live Video Icon">
                        Live video
                    </div>
                    <div class="action-btn">
                        <span>
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
                <div class="post-actions">
                    <div class="post-action-btn">
                        <img src="images/like.svg" alt="Like"> Like
                    </div>
                    <div class="post-action-btn">
                        <img src="images/comment.svg" alt="Comment"> Comment
                    </div>
                    <div class="post-action-btn">
                        <img src="images/share.svg" alt="Share"> Share
                    </div>
                </div>
            </div>
            </div>
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
    <div id="postModal" style="display: none;" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="closePostModal">&times;</span>
            <h3>Create Post</h3>
            <input type="file" id="postImageInput" accept="image/*"><br>
            <img id="previewPostImage" style="max-width:100%; display:none; margin-top:10px;"><br>
            <textarea id="postCaption" placeholder="What's on your mind?" rows="4"></textarea><br>
            <button id="submitPostBtn">Post</button>
        </div>
    </div>
    <script>
        // Script to load dynamic posts
        window.addEventListener('DOMContentLoaded', () => {
            const posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
            const mainContent = document.querySelector('.main-content');
            
            // Find the first feed-post or any other element to insert before,
            // otherwise just append to mainContent if no existing posts
            const firstFeedPost = mainContent ? mainContent.querySelector('.feed-post') : null;

            if (mainContent) { // Ensure mainContent exists before proceeding
                posts.forEach(post => {
                    const div = document.createElement('div');
                    div.className = 'feed-post';
                    div.innerHTML = `
                        <div class="post-header">
                            <img src="images/cocojones.jpeg" alt="User">
                            <div class="post-info">
                                <strong>Tidjani Islamiath</strong> · <span>${new Date(post.timestamp).toLocaleString()}</span>
                            </div>
                        </div>
                        <div class="post-content">${post.caption.replace(/\n/g, '<br>')}</div>
                        ${post.image ? `<img class="post-image" src="${post.image}" alt="Post Image">` : ''}
                        <div class="post-actions">
                            <div class="post-action-btn">
                                <img src="images/thumbs-up.svg" alt="Like"> Like
                            </div>
                            <div class="post-action-btn">
                                <img src="images/comment.svg" alt="Comment"> Comment
                            </div>
                            <div class="post-action-btn">
                                <img src="images/share.svg" alt="Share"> Share
                            </div>
                        </div>
                    `;
                    // Insert new posts right after the create-post section
                    const createPostSection = mainContent.querySelector('.create-post');
                    if (createPostSection) {
                        createPostSection.after(div);
                    } else if (firstFeedPost) {
                         // Fallback: if create-post isn't found, insert before the first static feed post
                        mainContent.insertBefore(div, firstFeedPost);
                    } else {
                        // If no other elements, just append to mainContent
                        mainContent.appendChild(div);
                    }
                });
            }
        });

        // Script for dynamic stories
        window.addEventListener('DOMContentLoaded', () => {
            const userStories = JSON.parse(localStorage.getItem('userStories') || '[]');
            const storyContainer = document.getElementById('storyContainer');

            // Skip the first card (which is the "Create New Story" static card)
            if (storyContainer) {
                userStories.forEach(story => {
                    const storyCard = document.createElement('div');
                    storyCard.className = 'story-card';
                    storyCard.innerHTML = `
                        <img src="${story.image || 'images/placeholder.jpg'}" class="story-image" alt="Story Image">
                        <img src="images/cocojones.jpeg" class="profile-pic-small" alt="Profile"> <div class="story-overlay">
                            <span>${story.caption || 'Tidjani Islamiath'}</span>
                        </div>
                    `;
                    storyContainer.appendChild(storyCard);
                });
            }
        });

        // Script for the Post Modal
        const openModalInput = document.getElementById('openPostModal'); // This is the input field
        const postModal = document.getElementById('postModal');
        const closeModalBtn = document.getElementById('closePostModal');
        const postImageInput = document.getElementById('postImageInput');
        const previewPostImage = document.getElementById('previewPostImage');
        const submitPostBtn = document.getElementById('submitPostBtn');
        const postCaption = document.getElementById('postCaption');

        // Open modal when the input field is clicked
        if (openModalInput) {
            openModalInput.addEventListener('click', () => {
                postModal.style.display = 'flex';
                // Reset form when opening
                postImageInput.value = '';
                previewPostImage.style.display = 'none';
                previewPostImage.src = '';
                postCaption.value = '';
            });
        }

        // Close modal
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                postModal.style.display = 'none';
            });
        }
        // Close modal if clicked outside modal-content
        if (postModal) {
            postModal.addEventListener('click', (e) => {
                if (e.target === postModal) {
                    postModal.style.display = 'none';
                }
            });
        }


        // Image preview
        if (postImageInput) {
            postImageInput.addEventListener('change', () => {
                const file = postImageInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = () => {
                        previewPostImage.src = reader.result;
                        previewPostImage.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewPostImage.src = '';
                    previewPostImage.style.display = 'none';
                }
            });
        }

        // Submit post
        if (submitPostBtn) {
            submitPostBtn.addEventListener('click', () => {
                const caption = postCaption.value;
                const imageSrc = previewPostImage.src;

                if (!imageSrc && !caption.trim()) {
                    alert('Add an image or text to post.');
                    return;
                }

                const newPost = {
                    image: imageSrc,
                    caption,
                    timestamp: new Date().toISOString(),
                };

                const posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                posts.unshift(newPost); // Add new post to the beginning
                localStorage.setItem('userPosts', JSON.stringify(posts));
                
                // Close modal and clear inputs
                postModal.style.display = 'none';
                postImageInput.value = '';
                previewPostImage.style.display = 'none';
                previewPostImage.src = '';
                postCaption.value = '';

                // Dynamically add the new post to the DOM
                const mainContent = document.querySelector('.main-content');
                const newPostDiv = document.createElement('div');
                newPostDiv.className = 'feed-post';
                newPostDiv.innerHTML = `
                    <div class="post-header">
                        <img src="images/cocojones.jpeg" alt="User">
                        <div class="post-info">
                            <strong>Tidjani Islamiath</strong> · <span>${new Date(newPost.timestamp).toLocaleString()}</span>
                        </div>
                    </div>
                    <div class="post-content">${newPost.caption.replace(/\n/g, '<br>')}</div>
                    ${newPost.image ? `<img class="post-image" src="${newPost.image}" alt="Post Image">` : ''}
                    <div class="post-actions">
                        <div class="post-action-btn">
                            <img src="images/thumbs-up.svg" alt="Like"> Like
                        </div>
                        <div class="post-action-btn">
                            <img src="images/comment.svg" alt="Comment"> Comment
                        </div>
                        <div class="post-action-btn">
                            <img src="images/share.svg" alt="Share"> Share
                        </div>
                    </div>
                `;

                const createPostSection = mainContent.querySelector('.create-post');
                if (createPostSection) {
                    createPostSection.after(newPostDiv); // Insert after the create-post section
                } else {
                    // Fallback if createPostSection is not found
                    mainContent.prepend(newPostDiv);
                }
            });
        }
    </script>
</body>
</html>