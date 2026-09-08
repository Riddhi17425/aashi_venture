@extends('layouts.master')

@section('body-class', 'page-privacy page-inner')

@section('title', 'Privacy Policy')

@push('styles')
<style>
    /* Disable all reveal and scroll animations on Privacy Policy page only */
    .page-privacy main,
    .page-privacy main *,
    .page-privacy .factory-intro__header,
    .page-privacy .about__content,
    .page-privacy .fade-in,
    .page-privacy .slide-up,
    .page-privacy .slide-left,
    .page-privacy .slide-right,
    .page-privacy .zoom-in {
        animation: none !important;
        transition: none !important;
        transform: none !important;
        opacity: 1 !important;
    }
</style>
@endpush

@section('content')

<main>
    <section class="section-block about-intro" aria-labelledby="privacy-page-heading">
        <div class="container-aashi">

            <header class="factory-intro__header">
                <p class="aashi-label">Legal Information</p>
                <h1 class="aashi-title aashi-title--page" id="privacy-page-heading">Privacy Policy</h1>
                <div class="about__text aashi-text aashi-text--section mt-4">
                    <p>At <b>Aashi Rainwear,</b> we respect your privacy and are committed to protecting the personal information you share with us.</p>
                    <p>This Privacy Policy explains how Aashi Rainwear collects, uses, stores, protects and handles personal information when you visit or use <b>aashirainwear.com,</b> submit an enquiry, purchase or enquire about our products, contact us, or otherwise interact with our website and services.</p>

                    <p>By using our website, you acknowledge the practices described in this Privacy Policy.</p>
                </div>
            </header>
            
            <div class="about-company about-company__layout mt-5" style="display:block;">
                <div class="about-company__copy w-100">

                    <div class="about__content">
                        <div class="about__text aashi-text aashi-text--section">

                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">1. Information We Collect</h3>
                            <p>Depending on how you interact with our website, we may collect information such as:</p>
                            <p><b>Personal Information</b></p>
                            <p>This may include:</p>

                            <ul>
                                <li>Name.</li>
                                <li>Email address.</li>
                                <li>Phone or mobile number.</li>
                                <li>Billing or delivery information, where applicable.</li>
                                <li>City, state, country or other location information.</li>
                                <li>Company name and business details.</li>
                                <li>Information provided through contact or enquiry forms.</li>
                            </ul>

                            <p><b>Order and Product Information</b></p>

                            <p>If you purchase or enquire about our products, we may collect information relating to:</p>

                            <ul>
                                <li>Products selected or requested.</li>
                                <li>Product codes.</li>
                                <li>Size.</li>
                                <li>Colour.</li>
                                <li>Quantity.</li>
                                <li>Customisation requirements.</li>
                                <li>Delivery requirements.</li>
                                <li>Other information necessary to process your enquiry or order.</li>
                            </ul>

                            <p><b>Technical Information</b></p>
                            <p>When you access our website, certain technical information may be collected automatically, such as:</p>

                            <ul>
                                <li>IP address.</li>
                                <li>Browser type.</li>
                                <li>Device information.</li>
                                <li>Operating system.</li>
                                <li>Website pages visited.</li>
                                <li>Approximate usage information.</li>
                                <li>Date and time of access.</li>
                                <li>Referring website or page.</li>
                            </ul>
                            <p>This information may be collected through cookies, analytics tools and similar technologies.</p>
                            
                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">2. How We Collect Information</h3>
                            <p>We may collect information when you:</p>

                            <ul>
                                <li>Visit or browse our website.</li>
                                <li>Submit a contact form.</li>
                                <li>Submit a bulk-quantity enquiry.</li>
                                <li>Request product information.</li>
                                <li>Make an enquiry about customised products.</li>
                                <li>Place or enquire about an order.</li>
                                <li>Contact our customer or sales team.</li>
                                <li>Subscribe to communications, where available.</li>
                                <li>Interact with our website or digital communications.</li>
                            </ul>

                            <p>You are responsible for ensuring that the information you provide is accurate and up to date.</p>
                            
                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">3. How We Use Your Information</h3>
                            <p>We may use the information we collect to:</p>
                            
                            <ul>
                                <li>Respond to your enquiries.</li>
                                <li>Provide product information.</li>
                                <li>Process and manage orders.</li>
                                <li>Provide quotations.</li>
                                <li>Handle bulk and customised product enquiries.</li>
                                <li>Communicate about products and services.</li>
                                <li>Coordinate delivery and fulfilment.</li>
                                <li>Provide customer support.</li>
                                <li>Improve our website and user experience.</li>
                                <li>Understand website usage and performance.</li>
                                <li>Prevent fraud, misuse and security threats.</li>
                                <li>Maintain business and transaction records.</li>
                                <li>Comply with applicable legal and regulatory requirements.</li>
                                <li>Communicate important service-related information.</li>
                            </ul>

                            <p>We will use personal information only for lawful purposes and in accordance with applicable law.</p>
                            
                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">4. Marketing Communications</h3>
                            <p>Where permitted by applicable law, we may use your contact information to send information about our products, services, offers, updates or other relevant communications.</p>

                            <p>Where consent is required, we will seek appropriate consent.</p>
                            <p>You may request to stop receiving promotional communications by contacting us or using an available unsubscribe mechanism.</p>
                            <p>Please note that you may continue to receive essential communications relating to an existing enquiry, order, transaction, account or service.</p>
                            
                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">5. Cookies and Similar Technologies</h3>
                            <p>Our website may use cookies and similar technologies to improve functionality, understand website usage and enhance the user experience.</p>
                            <p>Cookies may help us:</p>

                            <ul>
                                <li>Remember preferences.</li>
                                <li>Understand how visitors use our website.</li>
                                <li>Improve website performance.</li>
                                <li>Analyse traffic and engagement.</li>
                                <li>Support certain website functionalities.</li>
                            </ul>

                            <p>You may be able to control or disable cookies through your browser settings. Disabling certain cookies may affect some website functionality.</p>

                            <p>Where required by applicable law, appropriate consent mechanisms may be provided for cookies or similar technologies.</p>

                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">6. Analytics and Third-Party Services</h3>
                            <p>We may use third-party service providers for website analytics, hosting, payment processing, communication, security, advertising or other business functions.</p>

                            <p>These providers may process information on our behalf or independently in accordance with their own applicable terms and privacy policies.</p>

                            <p>Third-party services may include analytics, payment gateways, advertising platforms, communication tools, shipping providers and website infrastructure providers, depending on the services used by Aashi Rainwear from time to time.</p>

                            <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">7. Sharing of Personal Information</h3>

                            <p>We do not sell personal information merely for monetary consideration.</p>
                            <p>We may share personal information where reasonably necessary with:</p>

                            <ul>
                                <li>Service providers working on our behalf.</li>
                                <li>Payment service providers.</li>
                                <li>Logistics and delivery partners.</li>
                                <li>Website and technology providers.</li>
                                <li>Analytics or marketing service providers, where applicable.</li>
                                <li>Professional advisors.</li>
                                <li>Government authorities or law-enforcement agencies where legally required.</li>
                                <li>Other parties where disclosure is necessary to protect our legal rights, safety, security or property.</li>
                            </ul>

                            <p>Third parties receiving information may be required to handle it in accordance with applicable contractual, legal and security requirements.</p>

                             <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">8. Data Security</h3>

                             <p>We take reasonable technical and organisational measures to protect personal information against unauthorised access, misuse, alteration, disclosure, loss or destruction.</p>
                             <p>However, no internet transmission or electronic storage system can be guaranteed to be completely secure.</p>
                             <p>You should also take appropriate steps to protect your devices, accounts and information when accessing online services.</p>


                              <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">9. Data Retention</h3>

                              <p>We retain personal information only for as long as reasonably necessary for the purposes for which it was collected, including fulfilling transactions, responding to enquiries, maintaining business records, complying with legal obligations, resolving disputes and protecting our legitimate interests.</p>
                              <p>The applicable retention period may vary depending on the nature of the information and the purpose for which it is processed.</p>
                              <p>When information is no longer required, it may be deleted, anonymised or otherwise disposed of in accordance with applicable law and our internal practices.</p>


                               <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">10. Your Rights</h3>
                                <p>Subject to applicable law, you may have rights relating to your personal information, including the ability to:</p>
                               <ul>
                                    <li>Request information about the personal data we process.</li>
                                    <li>Request correction of inaccurate or incomplete information.</li>
                                    <li>Request deletion of personal information where legally applicable.</li>
                                    <li>Withdraw consent where processing is based on consent.</li>
                                    <li>Raise concerns regarding the processing of your personal information.</li>
                                    <li>Request assistance in exercising applicable privacy rights.</li>
                               </ul>
                               <p>Certain requests may be subject to verification and applicable legal limitations.</p>
                               <p>To exercise an applicable privacy right, you may contact us using the details provided below.</p>

                                <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">11. Children's Privacy</h3>

                                <p>Our website is not intended to knowingly collect personal information from children in circumstances where such collection is prohibited by applicable law.</p>
                                <p>If you believe that a child has provided personal information to us without the required authorisation or consent, please contact us so that we can take appropriate action.</p>

                                 <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">12. Third-Party Websites</h3>

                                 <p>Our website may contain links to third-party websites, social media platforms or other external services.</p>
                                 <p>This Privacy Policy does not apply to the privacy practices of those third parties.</p>
                                 <p>We encourage you to review their respective privacy policies before providing personal information to them.</p>

                                  <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">13. International Data Transfers</h3>

                                  <p>Depending on the technology providers and services used by Aashi Rainwear, personal information may be processed or stored in locations outside your state or country.</p>
                                  <p>Where applicable, such processing or transfer will be carried out in accordance with applicable laws and regulatory requirements.</p>

                                   <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">14. Changes to This Privacy Policy</h3>

                                   <p>We may update this Privacy Policy periodically to reflect changes in our business practices, website functionality, technology, applicable laws or regulatory requirements.</p>
                                   <p>Any revised version will be published on this page along with an updated "Last Updated" date.</p>
                                   <p>We encourage you to review this page periodically to remain informed about how we handle personal information.</p>

                                    <h3 class="mb-3 text-dark" style="font-family: var(--aashi-font-heading); font-size: 1.5rem; font-weight: 600;">15. Contact Us</h3>
                                    <p>If you have any questions, concerns or requests regarding this Privacy Policy or the handling of your personal information, please contact us:</p>
                                    <p><b>Aashi Rainwear</b></p>
                                    <p>843/2, Nidhi Industrial Estate, Village Rakanpur (Santej), Closer to Science City, Taluka Kalol, Gujarat – 382721, India</p>

                                    <p><b>Email: </b><a href="mailto:sales@aashirainwear.com" target="_blank"> sales@aashirainwear.com</a></p>
                                    <p><b>Phone: </b><a href="tel:+919879562106">+91 98795 62106</a></p>

                                    <!-- <p>Last Updated: [Insert Date]</p> -->
  
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- START - NEWSLETTER -->
    @include('front.partials.newsletter')
    <!-- END - NEWSLETTER -->

</main>
@endsection
