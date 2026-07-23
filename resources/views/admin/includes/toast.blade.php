<script>
function showAppToast(type, message) {
    const colors = {
        success: '#28a745',
        error:   '#dc3545',
        info:    '#17a2b8',
    };
    const icons = {
        success: 'bi-check-circle-fill',
        error:   'bi-x-circle-fill',
        info:    'bi-info-circle-fill',
    };

    const existing = document.getElementById('app-toast');
    if (existing) existing.remove();

    const toast = document.createElement('div');
    toast.id = 'app-toast';
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 280px;
        max-width: 380px;
        background: #fff;
        border-left: 5px solid ${colors[type] || colors.info};
        border-radius: 6px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 10px;
        opacity: 0;
        transform: translateX(20px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    `;

    toast.innerHTML = `
        <i class="bi ${icons[type] || icons.info}" style="color: ${colors[type] || colors.info}; font-size: 1.3rem;"></i>
        <span style="flex: 1; color: #333; font-size: 0.95rem;">${message}</span>
        <button onclick="document.getElementById('app-toast').remove()" style="background: none; border: none; color: #999; font-size: 1.1rem; cursor: pointer; line-height: 1;">&times;</button>
    `;

    document.body.appendChild(toast);

    requestAnimationFrame(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    });

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(20px)';
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

@if (session('toast_success') || session('toast_error') || session('toast_info'))
    document.addEventListener('DOMContentLoaded', function () {
        showAppToast(
            '{{ session('toast_success') ? 'success' : (session('toast_error') ? 'error' : 'info') }}',
            @json(session('toast_success') ?? session('toast_error') ?? session('toast_info'))
        );
    });
@endif
</script>
