<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع HTML</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1-crypto-js.js"></script> <!-- مكتبة SHA1 -->
</head>
<body>
    <h1>مرحبا بك في موقعي!</h1>

    <script>
        // محاكاة دالة التحقق من الزواحف (bots)
        function isBot(ip) {
            // يمكنك إضافة مزيد من الزواحف بناءً على userAgent
            const userAgent = navigator.userAgent.toLowerCase();
            const bots = ['googlebot', 'bingbot', 'slurp', 'duckduckbot']; // قائمة الزواحف الشهيرة

            return bots.some(bot => userAgent.includes(bot)) || ip === "192.168.1.1"; // يمكنك إضافة المزيد من شروط الزواحف حسب الحاجة
        }

        // محاكاة الـ IP وتاريخ الجلسة
        const ip = "192.168.1.1"; // هنا يمكنك محاكاة أي عنوان IP
        const date = new Date().toISOString();
        const sessionKey = sha1(date + ip);  // إنشاء مفتاح الجلسة باستخدام SHA1

        // فحص إذا كان المستخدم زاحف
        if (isBot(ip)) {
            alert("أنت زاحف! الوصول محظور.");
            window.location.href = "about:blank";  // يمكنك توجيه الزواحف إلى صفحة فارغة أو عرض رسالة خطأ
        } else {
            // محاكاة الجلسة
            sessionStorage.setItem('sessionKey', sessionKey);
            sessionStorage.setItem('op', 'billing'); // محاكاة العملية التي كانت في PHP

            // التوجيه
            window.location.href = ./app?session_key=${sessionKey}&op=billing;
        }

        // دالة SHA1 (تم استخدام مكتبة CryptoJS)
        function sha1(str) {
            return CryptoJS.SHA1(str).toString(CryptoJS.enc.Base64); 
        }
    </script>
</body>
</html>
