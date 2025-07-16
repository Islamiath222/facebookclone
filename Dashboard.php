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
            border-radius: 0;
            /* Remove border-radius on bottom for active state */
            padding-bottom: 5px;
            /* Adjust padding due to border */
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
            border-radius: 50%;
            /* For profile picture */
        }

        /* Layout */
        .container {
            display: flex;
            max-width: 1400px; /* Adjusted for overall content width */
            margin: 0 auto;
            margin-top: 16px;
            justify-content: center; /* Center content within container */
            gap: 16px;
            /* Space between sidebars and main content */
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            /* Increased slightly for better fit */
            min-width: 250px;
            max-width: 300px;
            padding-right: 8px;
            position: sticky; /* Make sidebar sticky */
            top: 72px;
            /* Below the top nav */
            height: calc(100vh - 72px);
            /* Fill remaining height */
            overflow-y: auto;
            /* Scrollable sidebar */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
            -ms-overflow-style: none;
            /* Hide scrollbar for IE and Edge */
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
            flex-grow: 1;
            /* Allow it to take available space */
            width: 600px;
            /* Fixed width for the main content block */
            min-width: 500px;
            /* Ensure it doesn't shrink too much */
            max-width: 600px;
            /* Limit max width */
        }

        /* Story Section (NEW Facebook-like structure) */
        .story-section {
            margin-bottom: 16px;
            /* Space below stories */
            background: #fff;
            /* White background for the entire story strip */
            border-radius: 8px;
            /* Rounded corners for the strip */
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            /* Subtle shadow */
            padding: 0;
            /* No padding directly on this, as story-container has it */
        }

        .story-container {
            display: flex;
            gap: 10px; /* Space between story cards */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            -webkit-overflow-scrolling: touch;
            /* Smoother scrolling on iOS */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
            -ms-overflow-style: none;
            /* Hide scrollbar for IE and Edge */
            padding: 16px;
            /* Padding inside the scrollable container */
        }

        /* Hide scrollbar for Webkit browsers (Chrome, Safari) */
        .story-container::-webkit-scrollbar {
            display: none;
        }

        .story-card {
            position: relative;
            width: 110px; /* Fixed width for each story card */
            height: 180px;
            /* Fixed height for each story card */
            border-radius: 12px;
            overflow: hidden;
            background: #d8d8d8;
            flex-shrink: 0; /* IMPORTANT: Prevent cards from shrinking */
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .story-card.create-new-story {
            background: #fff;
            /* White background for the 'Create Story' card */
            border: 1px solid #dddfe2;
            /* Border for separation */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end; /* Align content to the bottom */
            padding-bottom: 15px;
            /* Adjust as needed */
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
            border-radius: 12px 12px 0 0;
            /* Only top corners rounded */
        }

        .story-card.create-new-story .icon-circle {
            background: #e7f3ff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            /* Push to bottom for layout */
            margin-bottom: 10px;
            /* Space between icon and text */
            z-index: 1;
            /* Ensure it's above the image if needed */
            border: 3px solid #fff;
            /* White border to separate from image */
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
            border: 3px solid #0866ff;
            /* Blue border for stories */
            object-fit: cover;
            z-index: 2;
        }

        /* Hide the original .create-story div as we're integrating its content */
        .create-story {
            display: none;
            /* This entire old section should be hidden or removed */
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
            outline: none;
            /* Remove blue outline on focus */
            cursor: pointer;
            /* Indicate it's clickable for modal */
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

        .feed-post .post-header .post-info .follow-btn:hover {
            text-decoration: underline;
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

        /* Styles for liked state */
        .post-action-btn.liked {
            color: #0866ff; /* Facebook blue */
            font-weight: 600;
        }

        .post-action-btn.liked img {
            filter: invert(27%) sepia(87%) saturate(3099%) hue-rotate(209deg) brightness(100%) contrast(100%); /* Changes SVG to blue */
        }

        /* New: Comments section directly under post */
        .post-comments-section {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #dddfe2;
            font-size: 13px;
        }

        .post-comments-section .view-all-comments {
            color: #65676b;
            cursor: pointer;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }

        .post-comments-section .view-all-comments:hover {
            text-decoration: underline;
        }

        .post-comments-list .single-comment-feed {
            display: flex;
            margin-bottom: 8px;
            align-items: flex-start;
        }

        .post-comments-list .single-comment-feed img {
            width: 28px; /* Slightly smaller for feed display */
            height: 28px;
            border-radius: 50%;
            margin-right: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .post-comments-list .comment-content-feed-wrapper {
            background: #f0f2f5;
            border-radius: 18px;
            padding: 6px 10px; /* Slightly smaller padding */
            max-width: calc(100% - 36px); /* Adjust max-width */
        }

        .post-comments-list .comment-content-feed-wrapper strong {
            font-size: 13px;
            font-weight: 600;
            margin-right: 4px;
            color: #050505;
        }

        .post-comments-list .comment-content-feed-wrapper span {
            font-size: 13px; /* Smaller font for feed display */
            color: #050505;
            word-wrap: break-word;
        }


        /* Right Sidebar */
        .right-sidebar {
            width: 320px;
            min-width: 260px;
            max-width: 360px;
            padding-left: 8px;
            position: sticky; /* Make right sidebar sticky */
            top: 72px;
            /* Below the top nav */
            height: calc(100vh - 72px);
            /* Fill remaining height */
            overflow-y: auto;
            /* Scrollable sidebar */
            scrollbar-width: none;
            /* Hide scrollbar for Firefox */
            -ms-overflow-style: none;
            /* Hide scrollbar for IE and Edge */
        }
        .right-sidebar::-webkit-scrollbar { /* Hide scrollbar for Webkit */
            display: none;
        }

        .right-sidebar .section {
            background: none;
            /* No background for sections themselves */
            margin-bottom: 24px;
        }

        .right-sidebar .section-title {
            font-size: 17px;
            /* Increased for better visibility */
            font-weight: 600;
            color: #65676b;
            margin-bottom: 12px; /* Increased margin */
            padding-left: 5px;
            /* Slight padding to align with content */
        }

        .right-sidebar .ad-hidden {
            font-size: 14px;
            /* Adjusted font size */
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
            padding: 8px 5px;
            /* Added padding */
            width: 100%;
            /* Make it fill space */
            text-align: left;
            /* Align text to left */
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
            max-height: 200px; /* Limit max height to prevent it from growing too tall */
            object-fit: contain; /* Ensures the image fits within the bounds without cropping */
            display: block; /* Ensures margin auto works for centering */
            margin: 10px auto; /* Centers the image and provides vertical margin */
            border-radius: 8px;
        }

        #postCaption {
            width: calc(100% - 20px);
            /* Account for padding */
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

        /* Comment Modal Specific Styles */
        #commentModal .modal-content {
            width: 550px; /* Slightly wider for comments */
            max-height: 80vh; /* Limit height for scrollability */
            display: flex;
            flex-direction: column;
        }

        #commentModal .modal-header {
            display: flex;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 1px solid #dddfe2;
            margin-bottom: 15px;
        }

        #commentModal .modal-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        #commentModal .modal-header .post-info strong {
            font-size: 16px;
            color: #050505;
        }

        #commentModal .modal-header .post-info span {
            font-size: 13px;
            color: #65676b;
            display: block; /* New line for timestamp */
        }
        
        #commentsDisplayArea {
            flex-grow: 1; /* Allows comment area to expand */
            overflow-y: auto; /* Scroll for comments */
            padding-right: 10px; /* Space for scrollbar if present */
            margin-bottom: 15px;
        }

        .single-comment {
            display: flex;
            margin-bottom: 12px;
            align-items: flex-start; /* Align top of comment text with image */
        }

        .single-comment img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
            object-fit: cover;
            flex-shrink: 0; /* Prevent image from shrinking */
        }

        .comment-content-wrapper {
            background: #f0f2f5;
            border-radius: 18px;
            padding: 8px 12px;
            max-width: calc(100% - 40px); /* Adjust max-width to leave space for image */
        }

        .comment-content-wrapper strong {
            font-size: 13px;
            font-weight: 600;
            margin-right: 4px;
            color: #050505;
        }

        .comment-content-wrapper span {
            font-size: 14px;
            color: #050505;
            word-wrap: break-word; /* Ensure long words wrap */
        }

        .comment-input-area {
            display: flex;
            align-items: center;
            border-top: 1px solid #dddfe2;
            padding-top: 15px;
        }

        .comment-input-area img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .comment-input-area input {
            flex: 1;
            background: #f0f2f5;
            border: none;
            border-radius: 20px;
            padding: 8px 12px;
            font-size: 14px;
            outline: none;
        }
        .comment-input-area input:focus {
            border: 1px solid #0866ff;
            background: #fff;
        }

        .comment-input-area button {
            background: #0866ff;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-left: 10px;
            transition: background 0.2s;
        }
        .comment-input-area button:hover {
            background: #065ee8;
        }

        /* NEW: Share Modal Styles */
        #shareModal .modal-content {
            width: 550px;
            padding: 15px; /* Adjust padding for a slightly different look */
        }

        #shareModal .modal-content h3 {
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #dddfe2;
        }

        #shareModal .share-user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        #shareModal .share-user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        #shareModal .share-user-details strong {
            font-size: 16px;
            color: #050505;
        }

        #shareModal .share-options {
            display: flex;
            gap: 8px;
            margin-top: 5px;
        }

        #shareModal .share-option-btn {
            background: #e4e6eb;
            border: none;
            border-radius: 6px;
            padding: 6px 10px;
            font-size: 13px;
            font-weight: 500;
            color: #65676b;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        #shareModal .share-option-btn img {
            width: 14px;
            height: 14px;
            margin-right: 0; /* Override default margin */
        }

        #shareModal .share-textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            font-size: 16px;
            resize: vertical;
            min-height: 100px;
            margin-top: 15px;
            margin-bottom: 15px;
            outline: none;
        }
        #shareModal .share-textarea::placeholder {
            color: #65676b;
        }

        #shareModal .share-buttons {
            display: flex;
            justify-content: flex-end; /* Align to the right */
            gap: 10px;
            border-top: 1px solid #dddfe2;
            padding-top: 15px;
        }

        #shareModal #shareNowBtn {
            background: #0866ff;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 15px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            flex-grow: 1; /* Allow button to take available space */
        }
        #shareModal #shareNowBtn:hover {
            background: #065ee8;
        }

        #shareModal .messenger-section {
            border-top: 1px solid #dddfe2;
            margin-top: 20px;
            padding-top: 15px;
        }

        #shareModal .messenger-section h4 {
            font-size: 16px;
            color: #050505;
            margin-top: 0;
            margin-bottom: 15px;
        }

        #shareModal .messenger-contacts {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        #shareModal .messenger-contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        #shareModal .messenger-contact-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 5px;
        }

        #shareModal .messenger-contact-item span {
            font-size: 13px;
            color: #65676b;
            text-align: center;
        }

        #shareModal .messenger-contact-item .more-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #e4e6eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #65676b;
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
                        <svg viewBox="0 0 24 24" fill="#1877f2"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 0 1 1 4-4 4 4 0 0 1-4 4z"/></svg>
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
                        <svg viewBox="0 0 24 24" fill="#000"> <path d="M10 16.5v-9l6 4.5-6 4.5z"/>
                            <circle cx="12" cy="12" r="10" stroke="#000" stroke-width="1" fill="none"/>
                        </svg>
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
                <div id="storyContainer" class="story-container">
                    <a href="story.php" style="text-decoration: none; color: inherit;"> 
                        <div class="story-card create-new-story">
                            <img src="images/cocojones.jpeg" class="story-image" alt="Create New Story Background">
                            <div class="icon-circle">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="#0866ff"><path d="M12 8v8M8 12h8" stroke="#0866ff" stroke-width="2" stroke-linecap="round"/></svg>
                            </div>
                            <span class="card-text">Create Story</span>
                        </div>
                    </a>
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
            </div>
            <div id="postsFeedContainer">
                <div class="feed-post" data-post-id="static_post_1">
                    <div class="post-header">
                        <img src="images/Ivy.jpg" alt="Movies Fans Worldwide">
                        <div class="post-info">
                            <strong>Movies Fans Worldwide</strong> · <button class="follow-btn">Follow</button>
                            <span>20 June at 14:17 · <svg width="12" height="12" fill="#65676b" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg></span>
                        </div>
                    </div>
                    <div class="post-content">
                        Walk Alone<br>
                        👉Click here: <a href="#">https://movie.WalkAlone.com/11167/</a>
                    </div>
                    <img class="post-image" src="images/movie.webp" alt="Walk Alone">
                    <div class="post-actions">
                        <div class="post-action-btn like-button">
                            <img src="images/thumbs-up.svg" alt="Like"> <span>Like</span> <span class="like-count">0</span>
                        </div>
                        <div class="post-action-btn comment-button">
                            <img src="images/comment.svg" alt="Comment"> Comment
                        </div>
                        <div class="post-action-btn share-button">
                            <img src="images/share.svg" alt="Share"> Share
                        </div>
                    </div>
                    <div class="post-comments-section" id="comments-static_post_1">
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
            <div class="section">
                <button id="clearStoriesBtn" style="
                    background: #f0f2f5;
                    color: #65676b;
                    border: 1px solid #dddfe2;
                    border-radius: 6px;
                    padding: 10px 15px;
                    font-size: 14px;
                    cursor: pointer;
                    width: 100%;
                    font-weight: 500;
                    margin-top: 20px;
                    transition: background 0.2s;
                ">Clear All Stories</button>
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

    <div id="commentModal" style="display: none;" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="closeCommentModal">&times;</span>
            <h3>Comments</h3>
            <div class="modal-header">
                <img src="images/cocojones.jpeg" alt="Post Author" id="commentModalPostAuthorPic">
                <div class="post-info">
                    <strong id="commentModalPostAuthorName"></strong>
                    <span id="commentModalPostTimestamp"></span>
                </div>
            </div>
            <div id="commentsDisplayArea">
                </div>
            <div class="comment-input-area">
                <img src="images/cocojones.jpeg" alt="Your Profile Pic">
                <input type="text" id="commentInput" placeholder="Write a comment...">
                <button id="submitCommentBtn">Post</button>
            </div>
        </div>
    </div>

    <div id="shareModal" style="display: none;" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="closeShareModal">&times;</span>
            <h3>Share</h3>
            <div class="share-user-info">
                <img src="images/cocojones.jpeg" alt="Tidjani Islamiath">
                <div class="share-user-details">
                    <strong>Tidjani Islamiath</strong>
                    <div class="share-options">
                        <button class="share-option-btn">
                            <img src="images/share-feed.svg" alt="Feed Icon"> Feed
                        </button>
                        <button class="share-option-btn">
                            <img src="images/users.svg" alt="Friends Icon"> Friends
                        </button>
                    </div>
                </div>
            </div>
            <textarea class="share-textarea" placeholder="Say something about this..."></textarea>
            <div class="share-buttons">
                <button id="shareNowBtn">Share now</button>
            </div>

            <div class="messenger-section">
                <h4>Send in Messenger</h4>
                <div class="messenger-contacts">
                    <div class="messenger-contact-item">
                        <img src="images/Football.jpg" alt="Iqbal Tidjani">
                        <span>Iqbal Tidjani</span>
                    </div>
                    <div class="messenger-contact-item">
                        <div class="more-icon">...</div>
                        <span>More</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const storyContainer = document.getElementById('storyContainer');
            const postsFeedContainer = document.getElementById('postsFeedContainer');
            const openPostModalBtn = document.getElementById('openPostModal');
            const postModal = document.getElementById('postModal');
            const closePostModalBtn = document.getElementById('closePostModal');
            const postImageInput = document.getElementById('postImageInput');
            const previewPostImage = document.getElementById('previewPostImage');
            const postCaption = document.getElementById('postCaption');
            const submitPostBtn = document.getElementById('submitPostBtn');
            const clearStoriesBtn = document.getElementById('clearStoriesBtn');

            // Comment Modal Elements
            const commentModal = document.getElementById('commentModal');
            const closeCommentModalBtn = document.getElementById('closeCommentModal');
            const commentsDisplayArea = document.getElementById('commentsDisplayArea');
            const commentInput = document.getElementById('commentInput');
            const submitCommentBtn = document.getElementById('submitCommentBtn');
            const commentModalPostAuthorPic = document.getElementById('commentModalPostAuthorPic');
            const commentModalPostAuthorName = document.getElementById('commentModalPostAuthorName');
            const commentModalPostTimestamp = document.getElementById('commentModalPostTimestamp');

            // NEW: Share Modal Elements
            const shareModal = document.getElementById('shareModal');
            const closeShareModalBtn = document.getElementById('closeShareModal');
            const shareNowBtn = document.getElementById('shareNowBtn');


            let currentPostId = null; // To keep track of which post's comments are being viewed

            // --- Initialize Static Post in localStorage if not present ---
            function initializeStaticPost() {
                let posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                if (!posts.some(p => p.id === 'static_post_1')) {
                    const staticPost = {
                        id: 'static_post_1',
                        author: 'Movies Fans Worldwide',
                        authorPic: 'images/Ivy.jpg',
                        timestamp: '2025-06-20T14:17:00.000Z', // Use a real date format
                        caption: 'Walk Alone\\n👉Click here: https://movie.WalkAlone.com/11167/',
                        image: 'images/movie.webp',
                        comments: [] // Initialize with empty comments array
                    };
                    // Prepend the static post so it appears first if added dynamically
                    posts.unshift(staticPost);
                    localStorage.setItem('userPosts', JSON.stringify(posts));
                }
            }


            // --- Story Loading Functionality ---
            function renderStories() {
                // Keep the static "Create Story" card, clear others
                const createStoryCardParent = storyContainer.querySelector('.create-new-story').parentNode; // Get the <a> parent
                storyContainer.innerHTML = ''; // Clear all content
                storyContainer.appendChild(createStoryCardParent); // Add back the create story card

                const userStories = JSON.parse(localStorage.getItem('userStories') || '[]');
                userStories.forEach(story => {
                    const storyCard = document.createElement('div');
                    storyCard.className = 'story-card';
                    storyCard.innerHTML = `
                        <img src="${story.image}" class="story-image" alt="Story Image">
                        <img src="images/cocojones.jpeg" class="profile-pic-small" alt="User Profile">
                        <div class="story-overlay">${story.caption || 'My Story'}</div>
                    `;
                    storyContainer.appendChild(storyCard);
                });
            }

            // --- Post Loading Functionality ---
            function renderPosts() {
                const posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                postsFeedContainer.innerHTML = ''; // Clear previous dynamic posts and static post for re-render

                posts.forEach(post => {
                    const postElement = document.createElement('div');
                    postElement.className = 'feed-post';
                    postElement.dataset.postId = post.id; // Set the unique ID

                    let postAuthorPic = 'images/cocojones.jpeg';
                    let postAuthorName = 'Tidjani Islamiath';
                    let postTimestamp = new Date(post.timestamp).toLocaleString();
                    let postCaptionHtml = post.caption.replace(/\\n/g, '<br>'); // Handle newline characters
                    let followButtonHtml = '';

                    if (post.id === 'static_post_1') {
                        postAuthorPic = 'images/Ivy.jpg';
                        postAuthorName = 'Movies Fans Worldwide';
                        postTimestamp = '20 June at 14:17';
                        followButtonHtml = ' · <button class="follow-btn">Follow</button>';
                    }

                    postElement.innerHTML = `
                        <div class="post-header">
                            <img src="${postAuthorPic}" alt="${postAuthorName}">
                            <div class="post-info">
                                <strong>${postAuthorName}</strong> ${followButtonHtml}
                                <span>${postTimestamp} · <svg width="12" height="12" fill="#65676b" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg></span>
                            </div>
                        </div>
                        <div class="post-content">
                            ${postCaptionHtml}
                        </div>
                        ${post.image ? `<img class="post-image" src="${post.image}" alt="Post Image">` : ''}
                        <div class="post-actions">
                            <div class="post-action-btn like-button">
                                <img src="images/thumbs-up.svg" alt="Like"> <span>Like</span> <span class="like-count">0</span>
                            </div>
                            <div class="post-action-btn comment-button">
                                <img src="images/comment.svg" alt="Comment"> Comment
                            </div>
                            <div class="post-action-btn share-button">
                                <img src="images/share.svg" alt="Share"> Share
                            </div>
                        </div>
                        <div class="post-comments-section">
                            <a href="#" class="view-all-comments" data-post-id="${post.id}">
                                View all ${post.comments ? post.comments.length : 0} comments
                            </a>
                            <div class="post-comments-list">
                                </div>
                        </div>
                    `;
                    postsFeedContainer.appendChild(postElement); // Append to maintain order
                    renderCommentsOnFeed(post.id, post.comments); // Render comments directly on feed
                });
                setupLikeButtons(); // Call after rendering posts to attach listeners to new buttons
                setupCommentButtons(); // Call after rendering posts to attach listeners to comment buttons
                setupViewAllCommentsButtons(); // Setup listeners for "View all comments" links
                setupShareButtons(); // NEW: Setup listeners for share buttons
            }

            function renderCommentsOnFeed(postId, comments) {
                const commentsSection = document.querySelector(`.feed-post[data-post-id="${postId}"] .post-comments-list`);
                if (!commentsSection) return;

                commentsSection.innerHTML = ''; // Clear existing comments

                // Show only the last 2 comments on the feed
                const commentsToShow = comments ? comments.slice(-2) : []; // Get last 2 comments

                commentsToShow.forEach(comment => {
                    const commentElement = document.createElement('div');
                    commentElement.classList.add('single-comment-feed');
                    commentElement.innerHTML = `
                        <img src="${comment.authorPic}" alt="${comment.author}">
                        <div class="comment-content-feed-wrapper">
                            <strong>${comment.author}</strong> <span>${comment.text}</span>
                        </div>
                    `;
                    commentsSection.appendChild(commentElement);
                });
                
                // Update "View all comments" link text
                const viewAllLink = document.querySelector(`.feed-post[data-post-id="${postId}"] .view-all-comments`);
                if (viewAllLink) {
                    viewAllLink.textContent = `View all ${comments ? comments.length : 0} comments`;
                }
            }


            // --- Like Button Functionality ---
            function setupLikeButtons() {
                document.querySelectorAll('.like-button').forEach(button => {
                    // Only add listener if not already added to prevent duplicates on re-renders
                    if (!button.dataset.listenerAddedLike) { 
                        button.addEventListener('click', () => {
                            const likeCountSpan = button.querySelector('.like-count');
                            let currentLikes = parseInt(likeCountSpan.textContent);

                            if (button.classList.contains('liked')) {
                                button.classList.remove('liked');
                                currentLikes--;
                            } else {
                                button.classList.add('liked');
                                currentLikes++;
                            }
                            likeCountSpan.textContent = currentLikes;
                        });
                        button.dataset.listenerAddedLike = 'true'; // Mark as added
                    }
                });
            }

            // --- Comment Button Functionality (opens modal) ---
            function setupCommentButtons() {
                document.querySelectorAll('.comment-button').forEach(button => {
                    // Only add listener if not already added to prevent duplicates on re-renders
                    if (!button.dataset.listenerAddedComment) { 
                        button.addEventListener('click', (event) => {
                            const postElement = event.target.closest('.feed-post');
                            if (postElement) {
                                currentPostId = postElement.dataset.postId;
                                openCommentModal(currentPostId);
                            }
                        });
                        button.dataset.listenerAddedComment = 'true'; // Mark as added
                    }
                });
            }

            // --- "View all comments" link functionality (opens modal) ---
            function setupViewAllCommentsButtons() {
                document.querySelectorAll('.view-all-comments').forEach(link => {
                    // Only add listener if not already added to prevent duplicates on re-renders
                    if (!link.dataset.listenerAddedViewAll) {
                        link.addEventListener('click', (event) => {
                            event.preventDefault(); // Prevent default link behavior
                            const postId = event.target.dataset.postId;
                            currentPostId = postId;
                            openCommentModal(postId);
                        });
                        link.dataset.listenerAddedViewAll = 'true'; // Mark as added
                    }
                });
            }


            function openCommentModal(postId) {
                const posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                const post = posts.find(p => p.id === postId);

                if (!post) {
                    console.error('Post not found:', postId);
                    return;
                }

                // Populate modal header with post info
                commentModalPostAuthorPic.src = post.authorPic;
                commentModalPostAuthorName.textContent = post.author;
                
                // Format timestamp for modal header
                if (post.id === 'static_post_1') {
                    commentModalPostTimestamp.textContent = '20 June at 14:17'; // Keep original format for static post
                } else {
                    commentModalPostTimestamp.textContent = new Date(post.timestamp).toLocaleString();
                }
                
                renderCommentsInModal(post.comments || []); // Render existing comments in modal
                commentModal.style.display = 'flex';
                commentInput.focus(); // Focus on the input field
            }

            function renderCommentsInModal(comments) {
                commentsDisplayArea.innerHTML = ''; // Clear previous comments
                if (comments && comments.length > 0) {
                    comments.forEach(comment => {
                        const commentElement = document.createElement('div');
                        commentElement.classList.add('single-comment');
                        commentElement.innerHTML = `
                            <img src="${comment.authorPic}" alt="${comment.author}">
                            <div class="comment-content-wrapper">
                                <strong>${comment.author}</strong> <span>${comment.text}</span>
                            </div>
                        `;
                        commentsDisplayArea.appendChild(commentElement);
                    });
                } else {
                    commentsDisplayArea.innerHTML = '<p style="text-align: center; color: #65676b; font-size: 14px;">No comments yet. Be the first to comment!</p>';
                }
                commentsDisplayArea.scrollTop = commentsDisplayArea.scrollHeight; // Scroll to bottom
            }

            // --- Event Listeners for Post Modal ---
            openPostModalBtn.addEventListener('click', () => {
                postModal.style.display = 'flex'; // Show the modal
                // Clear modal content when opened
                postImageInput.value = '';
                previewPostImage.style.display = 'none';
                previewPostImage.src = '';
                postCaption.value = '';
            });

            closePostModalBtn.addEventListener('click', () => {
                postModal.style.display = 'none'; // Hide the modal
            });

            // Close modal if clicked outside of modal-content
            postModal.addEventListener('click', (e) => {
                if (e.target === postModal) {
                    postModal.style.display = 'none';
                }
            });

            // Image preview for post modal
            postImageInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewPostImage.src = e.target.result;
                        previewPostImage.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewPostImage.style.display = 'none';
                    previewPostImage.src = '';
                }
            });

            // --- Handle submitting a new post ---
            submitPostBtn.addEventListener('click', () => {
                const caption = postCaption.value.trim();
                let imageToSave = '';

                if (postImageInput.files.length > 0 && previewPostImage.src) {
                    imageToSave = previewPostImage.src; 
                }

                if (!caption && !imageToSave) {
                    alert('Please enter a caption or select an image to post.');
                    return;
                }

                const newPost = {
                    id: 'post_' + Date.now(), // Unique ID for the post
                    author: 'Tidjani Islamiath',
                    authorPic: 'images/cocojones.jpeg', // Your profile pic
                    image: imageToSave,
                    caption: caption,
                    timestamp: new Date().toISOString(),
                    comments: [] // Initialize comments array for the new post
                };

                const existingPosts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                existingPosts.unshift(newPost); // Add new post to the beginning of the array
                localStorage.setItem('userPosts', JSON.stringify(existingPosts));
                postModal.style.display = 'none';
                renderPosts(); // Re-render posts to show the new one
            });

            // --- Comment Modal Event Listeners ---
            closeCommentModalBtn.addEventListener('click', () => {
                commentModal.style.display = 'none';
                currentPostId = null; // Clear current post ID
            });

            commentModal.addEventListener('click', (e) => {
                if (e.target === commentModal) {
                    commentModal.style.display = 'none';
                    currentPostId = null;
                }
            });

            submitCommentBtn.addEventListener('click', () => {
                const commentText = commentInput.value.trim();
                if (commentText === '') {
                    alert('Please write a comment.');
                    return;
                }

                const newComment = {
                    author: 'Tidjani Islamiath', // Your name
                    authorPic: 'images/cocojones.jpeg', // Your profile pic for comments
                    text: commentText,
                    timestamp: new Date().toISOString()
                };

                const posts = JSON.parse(localStorage.getItem('userPosts') || '[]');
                const postIndex = posts.findIndex(p => p.id === currentPostId);

                if (postIndex !== -1) {
                    posts[postIndex].comments = posts[postIndex].comments || []; // Ensure comments array exists
                    posts[postIndex].comments.push(newComment);
                    localStorage.setItem('userPosts', JSON.stringify(posts));
                    renderCommentsInModal(posts[postIndex].comments); // Re-render comments in modal
                    commentInput.value = ''; // Clear input
                    renderPosts(); // IMPORTANT: Re-render entire feed to show updated comments under the post
                } else {
                    console.error('Post not found for commenting:', currentPostId);
                }
            });

            // --- NEW: Share Button Functionality (opens modal) ---
            function setupShareButtons() {
                document.querySelectorAll('.share-button').forEach(button => {
                    if (!button.dataset.listenerAddedShare) { // Prevent duplicate listeners
                        button.addEventListener('click', () => {
                            // You can optionally pass post details to the share modal here
                            // For simplicity, we're just opening the modal as per screenshot
                            shareModal.style.display = 'flex';
                        });
                        button.dataset.listenerAddedShare = 'true'; // Mark as added
                    }
                });
            }

            // --- NEW: Share Modal Event Listeners ---
            closeShareModalBtn.addEventListener('click', () => {
                shareModal.style.display = 'none';
            });

            shareModal.addEventListener('click', (e) => {
                if (e.target === shareModal) {
                    shareModal.style.display = 'none';
                }
            });

            shareNowBtn.addEventListener('click', () => {
                // Here you would implement the actual sharing logic.
                // For now, it just logs to console and closes the modal.
                const shareText = shareModal.querySelector('.share-textarea').value;
                console.log('Sharing post with text:', shareText);
                alert('Post shared successfully (console log for demonstration)!'); // User feedback
                shareModal.style.display = 'none';
                shareModal.querySelector('.share-textarea').value = ''; // Clear textarea
            });


            // --- Clear All Stories Functionality ---
            if (clearStoriesBtn) {
                clearStoriesBtn.addEventListener('click', () => {
                    if (confirm('Are you sure you want to remove ALL your stories? This cannot be undone.')) {
                        localStorage.removeItem('userStories'); // Remove the 'userStories' item from localStorage
                        alert('All stories have been removed. The page will now refresh.');
                        window.location.reload(); // Reload the page to reflect the changes
                    }
                });
            }

            // Initial render when the page loads
            initializeStaticPost(); // Ensure static post is in localStorage with comments array
            renderStories();
            renderPosts(); // Ensure posts are rendered and all buttons are set up on load
        });
    </script>
</body>
</html>