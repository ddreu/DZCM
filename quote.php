<style>
    /* MODAL STYLES */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgb(255, 255, 255);
        z-index: 999;
        display: none;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        display: none;
        width: 800px;
        height: 90%;
        z-index: 1000;
        gap: 30px;
        /* display: flex; */
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translate(-50%, -40%);
        }

        to {
            opacity: 1;
            transform: translate(-50%, -50%);
        }
    }

    /* CLOSE BUTTON */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #d40000;
        color: white;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        line-height: 30px;
    }

    .close-btn:hover {
        background: #b30000;
    }

    /* FORM AND INFO STYLES */
    .form-container,
    .info-container {
        flex: 1;
        padding: 20px;
    }

    .info-container {
        border-left: 1px solid #ddd;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: none;
        border-bottom: 2px solid #ccc;
        background: transparent;
        font-size: 16px;
        transition: border-bottom 0.3s ease;
        outline: none;
    }

    input:focus,
    textarea:focus {
        border-bottom: 2px solid #d40000;
    }

    .btn {
        background: #d40000;
        color: white;
        padding: 12px;
        border: none;
        width: 100%;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
        margin-top: 12px;
    }

    .btn:hover {
        background: #b30000;
    }

    .info-box {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
        border-radius: 5px;
    }

    .info-box i {
        font-size: 24px;
        color: #d40000;
    }

    h2 {
        margin-bottom: 10px;
        font-size: 24px;
    }

    /* OPEN BUTTON */
    .open-btn {
        padding: 12px 24px;
        background: #d40000;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
    }

    .open-btn:hover {
        background: #b30000;
    }



    /* Notification Modal Styling */
    .notification-modal {
        display: none;
        position: fixed;
        margin-top: 50px;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 400px;
        padding: 16px;
        z-index: 9999;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #fff;
        font-size: 16px;
        font-family: Arial, sans-serif;
        opacity: 0;
        animation: fadeIn 0.3s forwards;
    }

    .notification-modal.success {
        background-color: #4caf50;
    }

    .notification-modal.error {
        background-color: #f44336;
    }

    .notification-content h3 {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }

    .notification-content p {
        margin: 4px 0 0;
    }
</style>

<!-- MODAL OVERLAY -->
<div class="modal-overlay" id="modalOverlay" onclick="closeModal()"></div>

<!-- MODAL -->
<div class="modal" id="modal">
    <button class="close-btn" onclick="closeModal()">&times;</button>
    <form id="quoteFormModal" action="send-quote.php" method="POST" class="form-container">
        <h2>Get a Free Quote</h2>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="text" name="website" placeholder="Website">
        <textarea name="message" placeholder="Message" required></textarea>
        <button type="submit" class="btn">GET A QUOTE</button>
    </form>
    <div class="info-container">
        <h2>What's Next?</h2>
        <p>An email and phone call from one of our representatives.</p>
        <p>A time and cost estimation.
        </p>
        <p>An in-person meeting.
        </p>
        <div class="info-box">
            <i class="fas fa-phone-alt"></i>
            <div>
                <h3>Give us a call</h3>
                <span>
                    <a href="tel:+63289821268">+63 --- ---- ---</a> /
                    <a href="tel:+639985833381">+63 --- ---- ---</a>
                </span>
            </div>
        </div>
        <div class="info-box">
            <i class="fas fa-envelope"></i>
            <div>
                <h3>Send an email</h3>
                <p>dezcom@gmail.com</p>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div id="notificationModal" class="notification-modal">
    <div class="notification-content">
        <h3 id="notificationTitle"></h3>
        <p id="notificationMessage"></p>
    </div>
</div>