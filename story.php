<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Create Story - Facebook Clone</title>
  <meta name="viewport" content="width=1200" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f0f2f5;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .sidebar {
      width: 350px;
      background: #fff;
      border-right: 1px solid #e4e6eb;
      padding: 32px 24px;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
    .sidebar-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 24px;
    }
    .fb-logo {
      width: 40px;
      height: 40px;
    }
    #exitBtn {
      background: none;
      border: none;
      cursor: pointer;
      padding: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #exitBtn svg {
      stroke: #888;
      transition: stroke 0.2s;
      width: 24px;
      height: 24px;
    }
    #exitBtn:hover svg {
      stroke: #555;
    }
    .your-story-title {
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 32px;
    }
    .user-info {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 16px;
    }
    .user-info img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #e4e6eb;
      object-fit: cover;
    }
    .user-info span {
      font-size: 18px;
      font-weight: 500;
    }
    .settings-btn {
      margin-left: auto;
      background: #f0f2f5;
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }
    .main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f0f2f5;
    }
    .story-options {
      display: flex;
      gap: 32px;
    }
    .story-card {
      width: 260px;
      height: 400px;
      border-radius: 18px;
      background: linear-gradient(135deg, #6a8cff 0%, #a0e9fd 100%);
      box-shadow: 0 4px 24px rgba(0,0,0,0.04);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      cursor: pointer;
      transition: transform 0.13s;
    }
    .story-card.text {
      background: linear-gradient(135deg, #b16cea 0%, #ff6bcb 100%);
    }
    .story-card:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow: 0 8px 32px rgba(0,0,0,0.09);
    }
    .icon-circle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 24px;
      font-size: 32px;
      color: #1877f2;
    }
    .story-card.text .icon-circle {
      color: #b16cea;
    }
    .label {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      text-align: center;
      margin-bottom: 8px;
    }
    .desc {
      color: #f0f2f5;
      font-size: 15px;
      text-align: center;
      opacity: 0.85;
    }
    /* Modal styles */
    .modal-bg {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.14);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }
    .modal {
      background: #fff;
      border-radius: 10px;
      padding: 32px 28px 24px 28px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      min-width: 320px;
      max-width: 90vw;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }
    .close-btn {
      position: absolute;
      right: 18px;
      top: 14px;
      background: none;
      border: none;
      font-size: 22px;
      color: #888;
      cursor: pointer;
    }
    .modal h2 {
      font-size: 22px;
      margin-bottom: 18px;
      color: #1877f2;
    }
    .modal input[type="file"] {
      margin-bottom: 18px;
    }
    .modal textarea {
      width: 100%;
      min-height: 120px;
      border-radius: 10px;
      border: 1px solid #dddfe2;
      padding: 12px;
      font-size: 16px;
      margin-bottom: 18px;
      resize: vertical;
      background: #f0f2f5;
    }
    .preview-img, .preview-video {
      max-width: 220px;
      max-height: 220px;
      margin-bottom: 18px;
      border-radius: 10px;
      background: #f0f2f5;
    }
    .submit-btn {
      background: #1877f2;
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 10px 32px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.15s;
    }
    .submit-btn:hover {
      background: #1459b2;
    }
    #storyComposeBox {
  display: none;
  position: fixed;
  top: 80px;
  left: 16px;
  width: 320px;
  background: white;
  box-shadow: 0 4px 24px rgba(0,0,0,0.12);
  border-radius: 12px;
  padding: 16px;
  z-index: 10000;
  flex-direction: column;
  gap: 8px;
  font-family: 'Segoe UI', Arial, sans-serif;
}
#storyComposeBox img {
  width: 100%;
  border-radius: 8px;
  object-fit: cover;
  max-height: 300px;
}
#storyComposeBox textarea {
  width: 100%;
  min-height: 60px;
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
  resize: vertical;
}
#storyComposeBox button {
  cursor: pointer;
  border-radius: 24px;
  padding: 10px 16px;
  font-weight: 600;
  border: none;
}
#postStoryBtn {
  background-color: #0866ff;
  color: white;
}
#cancelStoryBtn {
  background: none;
  border: none;
  color: #65676b;
  margin-top: 4px;
}

  </style>
</head>
<body>
  
  <div class="container">
    <!-- Hidden file input for image selection -->
<input type="file" id="storyFileInput" accept="image/*" style="display:none" />

<!-- Story Compose Box (hidden initially) -->
<div id="storyComposeBox" style="display:none; position: fixed; top: 80px; left: 16px; width: 320px; background: white; box-shadow: 0 4px 24px rgba(0,0,0,0.12); border-radius: 12px; padding: 16px; z-index: 10000; flex-direction: column; gap: 8px;">
  <img id="storyPreviewImg" src="" alt="Story preview" style="width: 100%; border-radius: 8px; object-fit: cover; max-height: 300px;" />
  <textarea id="storyCaptionInput" placeholder="Write something..." style="width: 100%; min-height: 60px; border-radius: 8px; border: 1px solid #ddd; padding: 8px; font-size: 14px; resize: vertical;"></textarea>
  <button id="postStoryBtn" style="background-color: #0866ff; color: white; border: none; border-radius: 24px; padding: 10px 16px; font-weight: 600; cursor: pointer;">Post to Story</button>
  <button id="cancelStoryBtn" style="background: none; border: none; color: #65676b; cursor: pointer; margin-top: 4px;">Cancel</button>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <img src="images/facebook.jpeg" alt="Facebook" class="fb-logo" />
        <button id="exitBtn" title="Exit">
          <svg viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div class="your-story-title">Your story</div>
      <div class="user-info">
        <img src="images/cocojones.jpeg" alt="Tidjani Islamiath" />
        <span>Tidjani Islamiath</span>
        <button class="settings-btn" title="Settings">... <svg width="20" height="20" fill="none" stroke="#65676b" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09c0 .66.38 1.26 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09c.23.63.85 1 1.51 1H21a2 2 0 1 1 0 4h-.09c-.66 0-1.26.38-1.51 1z"/></svg>
        </button>
      </div>
      <!-- Hidden file input -->
<input type="file" id="fileInput" accept="image/*,video/*" style="display:none" />

<!-- Compose box fixed on left, hidden initially -->
<div id="composeBox" style="display:none; position: fixed; top: 80px; left: 16px; width: 320px; background: white; box-shadow: 0 4px 24px rgba(0,0,0,0.12); border-radius: 12px; padding: 16px; z-index: 1000; flex-direction: column;">
  <img id="previewMedia" src="" alt="Preview" style="width: 100%; max-height: 300px; object-fit: contain; border-radius: 8px; margin-bottom: 12px;" />
  <textarea id="storyCaption" placeholder="Write something..." style="width: 100%; min-height: 80px; border-radius: 8px; border: 1px solid #dddfe2; padding: 8px; font-size: 14px; resize: vertical;"></textarea>
  <button id="shareStoryBtn" class="submit-btn" style="width: 100%; margin-top: 12px;">Share to Story</button>
  <button id="cancelStoryBtn" style="margin-top: 8px; background: none; border: none; color: #65676b; cursor: pointer;">Cancel</button>
</div>

    </div>
    <!-- Main -->
    <div class="main">
      <div class="story-options">
        <!-- Photo/Video Story Card -->
        <div class="story-card" id="photoStoryBtn">
          <div class="icon-circle">
           <i data-visualcompletion="css-img" class="x1b0d499 xep6ejk" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v4/y9/r/kMP5UvPX07A.png?_nc_eui2=AeFzmO8Hz9HRXnRUnKWDZe1wG73aYjkpxcMbvdpiOSnFw6Xd901Kv_54pg_odO_w5hWswiCr-EWD_4K3ZvmZf-jg&quot;); background-position: 0px -486px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
          </div>
          <div class="label">Create a Photo Story</div>
         
        </div>
        <!-- Text Story Card -->
        <div class="story-card text" id="textStoryBtn">
          <div class="icon-circle">
            <span style="font-weight:700;font-size:28px;">Aa</span>
          </div>
          <div class="label">Create a Text Story</div>
          
        </div>
      </div>
    </div>
  </div>
 
  </div>
  
  <script>
    // When clicking photo story card, open file dialog directly
    document.getElementById('photoStoryBtn').onclick = function() {
      document.getElementById('fileInput').click();
    };

    // When clicking text story card, open text modal as before
    document.getElementById('textStoryBtn').onclick = function() {
      document.getElementById('textModal').style.display = 'flex';
    };

    // Close modal function
    function closeModal(id) {
      document.getElementById(id).style.display = 'none';
      if(id === 'photoModal') {
        document.getElementById('fileInput').value = '';
        document.getElementById('filePreview').innerHTML = '';
      }
      if(id === 'textModal') {
        document.getElementById('storyText').value = '';
      }
    }

    // Preview image or video and open modal after file selection
    function previewFile() {
      const file = document.getElementById('fileInput').files[0];
      const preview = document.getElementById('filePreview');
      preview.innerHTML = '';
      if(file) {
        // Open modal after file is selected
        document.getElementById('photoModal').style.display = 'flex';

        if(file.type.startsWith('image/')) {
          const img = document.createElement('img');
          img.className = 'preview-img';
          img.src = URL.createObjectURL(file);
          preview.appendChild(img);
        } else if(file.type.startsWith('video/')) {
          const video = document.createElement('video');
          video.className = 'preview-video';
          video.src = URL.createObjectURL(file);
          video.controls = true;
          preview.appendChild(video);
        } else {
          preview.textContent = 'Unsupported file type.';
        }
      }
    }

    // Exit button redirects to dashboard.php
    document.getElementById('exitBtn').addEventListener('click', function() {
      window.location.href = 'dashboard.php';
    });
    
const photoStoryBtn = document.getElementById('photoStoryBtn');
const fileInput = document.getElementById('fileInput');
const composeBox = document.getElementById('composeBox');
const previewMedia = document.getElementById('previewMedia');
const storyCaption = document.getElementById('storyCaption');
const shareStoryBtn = document.getElementById('shareStoryBtn');
const cancelStoryBtn = document.getElementById('cancelStoryBtn');
const exitBtn = document.getElementById('exitBtn');

// Open file dialog on photo story card click
photoStoryBtn.addEventListener('click', () => {
  fileInput.click();
});

// When file selected, show preview and compose box
fileInput.addEventListener('change', () => {
  const file = fileInput.files[0];
  if (!file) return;

  if (file.type.startsWith('image/')) {
    previewMedia.src = URL.createObjectURL(file);
  } else if (file.type.startsWith('video/')) {
    // For simplicity, just show an image placeholder or handle video preview if you want
    previewMedia.src = ''; // Or a video preview element if you implement it
    alert('Video preview not implemented yet.');
    return;
  } else {
    alert('Unsupported file type.');
    fileInput.value = '';
    return;
  }

  composeBox.style.display = 'flex';
  storyCaption.value = '';
  storyCaption.focus();
});

// Cancel button hides compose box and resets input
cancelStoryBtn.addEventListener('click', () => {
  composeBox.style.display = 'none';
  fileInput.value = '';
  previewMedia.src = '';
  storyCaption.value = '';
});

// Share story button: simulate upload and redirect to home page
shareStoryBtn.addEventListener('click', () => {
  const caption = storyCaption.value.trim();

  if (!previewMedia.src) {
    alert('Please select an image first.');
    return;
  }
//helps upload image
  // TODO: Implement actual upload logic here (e.g., AJAX, form submit)
  // For demo, simulate success and redirect

  // Optionally, you can save the story data to localStorage or sessionStorage to display on dashboard
  // Example:
  const newStory = {
    image: previewMedia.src,
    caption: caption,
    timestamp: new Date().toISOString(),
  };
  // Save stories array in localStorage
  let stories = JSON.parse(localStorage.getItem('userStories') || '[]');
  stories.unshift(newStory);
  localStorage.setItem('userStories', JSON.stringify(stories));

  // Redirect to dashboard (home page)
  window.location.href = 'dashboard.php';
});

// Exit button redirects to dashboard.php as before
exitBtn.addEventListener('click', () => {
  window.location.href = 'dashboard.php';
});


  </script>
</body>
</html>
