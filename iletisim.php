<!DOCTYPE html>
<html lang="tr">

<!-- Mirrored from elegance2.lol/iletisim.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Apr 2025 22:07:10 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İstanbul Deneme İletişim</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --text-color: #ffffff;
            --background-color: #1a1a2e;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: hidden;
            position: relative;
            perspective: 1000px;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
            transform-style: preserve-3d;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px) rotateX(20deg); }
            to { opacity: 1; transform: translateY(0) rotateX(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotateX(0); }
            50% { transform: translateY(-10px) rotateX(5deg); }
        }
        .profile {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        .profile-pic-container {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .profile-pic-container:hover img {
            transform: scale(1.1);
        }
        .profile-pic-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
        }
        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }
        h1 {
            color: var(--text-color);
            margin-top: 20px;
            font-size: 28px;
            font-weight: 600;
            animation: slideIn 0.5s ease-out 0.5s both;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .bio {
            color: var(--text-color);
            margin-bottom: 30px;
            font-size: 16px;
            animation: slideIn 0.5s ease-out 0.7s both;
        }
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .contact-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out calc(var(--delay) * 0.2s) both;
            text-decoration: none;
            overflow: hidden;
            position: relative;
        }
        .contact-item::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.3s ease;
            opacity: 0;
        }
        .contact-item:hover::before {
            top: -100%;
            left: -100%;
            opacity: 1;
        }
        .contact-item:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.2);
        }
        .icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            transition: transform 0.3s ease;
            z-index: 1;
        }
        .contact-item:hover .icon {
            transform: rotate(360deg);
        }
        .telegram { background-color: #0088cc; }
        .whatsapp { background-color: #25D366; }
        .skype { background-color: #00AFF0; }
        .contact-item p {
            color: var(--text-color);
            font-size: 16px;
            z-index: 1;
        }
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }
        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: var(--primary-color);
            border-radius: 50%;
            animation: float 15s infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            25% { transform: translateY(-30px) translateX(30px); }
            50% { transform: translateY(-60px) translateX(-30px); }
            75% { transform: translateY(-30px) translateX(60px); }
        }
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--text-color);
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 10;
        }
        @media (max-width: 480px) {
            .container {
                padding: 30px;
            }
            .profile-pic-container {
                width: 120px;
                height: 120px;
            }
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="particles"></div>
    <div class="container">
        <div class="profile">
            <div class="profile-pic-container">
                <img src="https://i.hizliresim.com/guasbr0.png" alt="Profil Resmi">
            </div>
            <h1>İstanbul Deneme</h1>
            <p class="bio">İstanbul Deneme İletişim Bilgileri</p>
        </div>
        <div class="contact-info">
            <a href="https://api.whatsapp.com/send/?phone=+447785792446&amp;text=Merhaba%2C+ilan+vermek+istiyorum.&amp;type=phone_number&amp;app_absent=0" class="contact-item" style="--delay: 3" rel="noopener noreferrer">
                <div class="icon whatsapp">
                    <?xml version="1.0" encoding="utf-8"?><svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"/><path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"/><path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"/><defs><linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"><stop stop-color="#5BD066"/><stop offset="1" stop-color="#27B43E"/></linearGradient></defs></svg>
                </div>
                <p>+447785792446</p>
            </a>
            <a href="#" class="contact-item" style="--delay: 1" rel="noopener noreferrer">
                <div class="icon skype">
                    <?xml version="1.0" encoding="iso-8859-1"?><svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><path style="fill:#00B5EB;" d="M496.11,303.669c2.648-15.007,4.414-30.897,4.414-46.786c0-133.297-108.579-241.876-242.759-241.876c-15.89,0-31.779,1.766-46.786,4.414C189.793,7.062,165.959,0,140.359,0C62.676,0,0,62.676,0,140.359c0,25.6,7.062,50.317,19.421,70.621c-2.648,15.007-4.414,30.897-4.414,46.786c0,134.179,108.579,242.759,242.759,242.759c15.89,0,31.779-1.766,46.786-4.414c20.303,12.359,45.021,15.89,70.621,15.89C451.972,512,512,451.972,512,374.29C512,348.69,507.586,324.855,496.11,303.669"/><path style="fill:#FFFFFF;" d="M262.179,424.607c-86.51,0-129.766-32.662-143.007-73.269s15.89-52.083,24.717-52.966c8.828-0.883,28.248,1.766,34.428,18.538c6.179,17.655,24.717,52.083,66.207,56.497s68.855-15.007,76.8-34.428c7.945-20.303-7.062-47.669-70.621-56.497s-130.648-37.076-130.648-101.517s74.152-90.041,143.89-90.041s105.048,39.724,112.993,54.731c9.71,19.421,6.179,51.2-16.772,56.497c-23.834,6.179-36.193-7.062-53.848-39.724c-17.655-33.545-82.097-24.717-103.283-6.179c-21.186,19.421-15.89,46.786,74.152,63.559c89.159,17.655,122.703,49.434,122.703,100.634C399.007,370.759,348.69,424.607,262.179,424.607"/></svg>
                </div>
                <p>Sadece Whatsapp!</p>
            </a>
            <a href="#" class="contact-item" style="--delay: 2" rel="noopener noreferrer">
                <div class="icon telegram">
                    <?xml version="1.0" encoding="utf-8"?><svg width="800px" height="800px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="14" fill="url(#paint0_linear_87_7225)"/><path d="M22.9866 10.2088C23.1112 9.40332 22.3454 8.76755 21.6292 9.082L7.36482 15.3448C6.85123 15.5703 6.8888 16.3483 7.42147 16.5179L10.3631 17.4547C10.9246 17.6335 11.5325 17.541 12.0228 17.2023L18.655 12.6203C18.855 12.4821 19.073 12.7665 18.9021 12.9426L14.1281 17.8646C13.665 18.3421 13.7569 19.1512 14.314 19.5005L19.659 22.8523C20.2585 23.2282 21.0297 22.8506 21.1418 22.1261L22.9866 10.2088Z" fill="white"/><defs><linearGradient id="paint0_linear_87_7225" x1="16" y1="2" x2="16" y2="30" gradientUnits="userSpaceOnUse"><stop stop-color="#37BBFE"/><stop offset="1" stop-color="#007DBB"/></linearGradient></defs></svg>
                </div>
                <p>Sadece Whatsapp!</p>
            </a>
        </div>
    </div>
    <script>
        function createParticle() {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 10 + 's';
            document.querySelector('.particles').appendChild(particle);
        }

        for (let i = 0; i < 100; i++) {
            createParticle();
        }
    </script>

<script type="text/javascript" src="unprotected/back_to_spaceship5249.html?hash=4975d460e508829e8fb64d3962bc44ad35f3a95a"></script>


<script src="unprotected/hc-filters3d08.html?hash=67df813d-d192-4c47-81eb-e5daaf5540f8"> </script>
</body>

<!-- Mirrored from elegance2.lol/iletisim.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Apr 2025 22:07:11 GMT -->
</html>