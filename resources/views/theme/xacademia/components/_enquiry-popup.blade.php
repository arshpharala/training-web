<!-- Enquiry Modal -->
<div id="enquiryModal" class="enquiry-modal enquiry-hidden" role="dialog" aria-modal="true">
    <div class="enquiry-box">
        <button class="enquiry-close" onclick="closeEnquiryModal()" aria-label="Close">×</button>

        <section class="enquiry-card" aria-live="polite">
            <div class="enquiry-body">
                <header>
                    <!-- IDs added so we can update dynamically -->
                    <h1 id="enquiryHeading">Talk to a learning expert</h1>
                    <p class="muted" id="enquirySubHeading">
                        Tell us a bit about your needs. We will get back within one business day.
                        Not sure where to begin? Tell us your goal and we will design a bespoke learning plan.
                    </p>
                </header>

                <form id="enquiryForm" class="ajax-form" action="{{ route('enquiry') }}" method="POST">
                    @csrf
                    <!-- Hidden fields for meta data -->
                    <input type="hidden" name="course" id="metaCourse">
                    <input type="hidden" name="course_id" id="metaCourseId">
                    <input type="hidden" name="topic" id="metaTopic">
                    <input type="hidden" name="topic_id" id="metaTopicId">
                    <input type="hidden" name="category" id="metaCategory">
                    <input type="hidden" name="category_id" id="metaCategoryId">
                    <input type="hidden" name="url" id="metaUrl">
                    <input type="hidden" name="delivery_method" id="metaDeliveryMethod">

                    <!-- Row 1 -->
                    <div class="enquiry-grid enquiry-cols-2">
                        <div>
                            <label for="name">Full name *</label>
                            <input id="name" name="name" type="text" placeholder="Jane Doe" required />
                        </div>
                        <div>
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="email" placeholder="name@email.com" required />
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="enquiry-grid enquiry-cols-3">
                        <div class="enquiry-col-span-2">
                            <label for="phone">Mobile (optional)</label>
                            <input id="phone" name="phone" type="tel" placeholder="e.g., +44 7123 456789" />
                        </div>
                        <div>
                            <label for="country">Country *</label>
                            <select id="country" name="country" required>
                                <option value="" disabled selected>Select</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="IN">India</option>
                                <option value="US">United States</option>
                                <option value="GB">United Kingdom</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div>
                        <label>Who’s covering the training cost? *</label>
                        <div class="enquiry-radios">
                            <label class="enquiry-radio-card">
                                <input type="radio" name="funding" value="employer" checked />
                                <span>My employer</span>
                            </label>
                            <label class="enquiry-radio-card">
                                <input type="radio" name="funding" value="self" />
                                <span>I’ll pay myself</span>
                            </label>
                            <label class="enquiry-radio-card">
                                <input type="radio" name="funding" value="unsure" />
                                <span>Not sure yet</span>
                            </label>
                        </div>
                        <p class="enquiry-context" id="fundingHelp">
                            We work with HR/L&amp;D teams globally. Need a <strong>formal quote</strong>,
                            <strong>PO/invoice</strong>, or <strong>multi-seat discount</strong>? We will sort it.
                        </p>
                    </div>

                    <!-- Row 4 -->
                    <div class="enquiry-grid enquiry-cols-2">
                        <div>
                            <label for="company">Company (optional)</label>
                            <input id="company" name="company" type="text" placeholder="Company Ltd" />
                        </div>
                        <div>
                            <label for="role">Job title (optional)</label>
                            <input id="role" name="role" type="text" placeholder="IT Manager" />
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div>
                        <label for="course">Which course are you interested in? *</label>
                        <input id="course" name="course" type="text" list="courseList"
                            placeholder="Start typing a course" required />
                        <datalist id="courseList">
                            <option value="CompTIA ITF+"></option>
                            <option value="CompTIA A+"></option>
                            <option value="CompTIA Network+"></option>
                            <option value="CompTIA Security+"></option>
                            <option value="CompTIA CySA+"></option>
                            <option value="CompTIA PenTest+"></option>
                            <option value="CompTIA CASP+"></option>
                            <option value="CompTIA Cloud+"></option>
                            <option value="CompTIA Server+"></option>
                            <option value="CompTIA Linux+"></option>
                            <option value="CompTIA Data+"></option>
                            <option value="CompTIA Project+"></option>
                            <option value="ISACA CISA"></option>
                            <option value="ISACA CISM"></option>
                            <option value="ISACA CRISC"></option>
                            <option value="ISACA CGEIT"></option>
                            <option value="ISACA CDPSE"></option>
                            <option value="EC-Council CEH"></option>
                            <option value="EC-Council CHFI"></option>
                            <option value="EC-Council CPENT"></option>
                            <option value="EC-Council ECSA"></option>
                            <option value="EC-Council CCISO"></option>
                            <option value="EC-Council CND"></option>
                            <option value="EC-Council CSA"></option>
                            <option value="CISO Foundations"></option>
                            <option value="CISO Program - Roadmap"></option>
                            <option value="Chief Information Security Officer (CISO) Coaching"></option>
                            <option value="ISO 27001 Lead Implementer"></option>
                            <option value="ISO 27001 Lead Auditor"></option>
                            <option value="NIST CSF Practitioner"></option>
                            <option value="SOC Analyst (Blue Team)"></option>
                            <option value="Cloud Security on AWS"></option>
                            <option value="Microsoft 365 Security Administrator"></option>
                            <option value="ITIL 4 Foundation"></option>
                            <option value="Project Management Professional (PMP)"></option>
                            <option value="Soft Skills and Personal Growth"></option>
                            <option value="AI for Cybersecurity Practitioners"></option>
                        </datalist>
                        <p class="hint">
                            You can type your own course name. If you are not sure where to start, write
                            "Not sure" and our team will guide you with a bespoke plan.
                        </p>
                    </div>

                    <!-- Accordion (ALL manager fields) -->
                    <details class="enquiry-disclosure mb-4">
                        <summary>
                            Add details (group size, delivery, start date, budget and contact preferences) – optional
                        </summary>

                        <div class="enquiry-grid enquiry-cols-2">
                            <div>
                                <label for="groupSize">How many learners?</label>
                                <input id="groupSize" name="groupSize" type="text"
                                    placeholder="e.g., 1, 5, 12" />
                            </div>
                            <div>
                                <label for="deliveryMode">Delivery mode</label>
                                <select id="deliveryMode" name="deliveryMode">
                                    <option value="">Select</option>
                                    <option value="virtual">Live virtual</option>
                                    <option value="onsite">Onsite at your location</option>
                                    <option value="blended">Blended (virtual + onsite)</option>
                                    <option value="selfpaced">Self-paced</option>
                                </select>
                            </div>
                        </div>

                        <div class="enquiry-grid enquiry-cols-3">
                            <div>
                                <label for="startTimeline">When would you like to start?</label>
                                <select id="startTimeline" name="startTimeline">
                                    <option value="">Select</option>
                                    <option value="asap">ASAP</option>
                                    <option value="weeks1to2">In 1–2 weeks</option>
                                    <option value="thisMonth">This month</option>
                                    <option value="flexible">Flexible</option>
                                </select>
                            </div>
                            <div>
                                <label for="budgetRange">Approx. budget</label>
                                <select id="budgetRange" name="budgetRange">
                                    <option value="">Select</option>
                                    <option value="under500">Under £500</option>
                                    <option value="500to1000">£500–£1,000</option>
                                    <option value="1kto5k">£1,000–£5,000</option>
                                    <option value="over5k">£5,000+</option>
                                    <option value="preferNo">Prefer not to say</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center" style="padding-top:28px">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="needQuote" name="needQuote" />
                                    I need a formal quote
                                </label>
                            </div>
                        </div>

                        <div class="enquiry-grid enquiry-cols-2">
                            <div>
                                <label for="contactChannel">Preferred contact method</label>
                                <select id="contactChannel" name="contactChannel">
                                    <option value="email" selected>Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="whatsapp">WhatsApp</option>
                                </select>
                            </div>
                            <div>
                                <label for="contactTime">Best time to contact</label>
                                <select id="contactTime" name="contactTime">
                                    <option value="any" selected>Any time</option>
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                    <option value="evening">Evening</option>
                                </select>
                            </div>
                        </div>

                        <div class="enquiry-grid enquiry-cols-2">
                            <div>
                                <label for="heardAbout">How did you hear about us?</label>
                                <select id="heardAbout" name="heardAbout">
                                    <option value="">Select</option>
                                    <option value="google">Google search</option>
                                    <option value="linkedin">LinkedIn</option>
                                    <option value="referral">Referral</option>
                                    <option value="email">Email/newsletter</option>
                                    <option value="event">Event/webinar</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="message">Message</label>
                                <textarea id="message" name="message"
                                    placeholder="Timelines, group size, delivery preference, special requirements…"></textarea>
                            </div>
                        </div>
                    </details>

                    <!-- Consents -->
                    <div class="checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="marketingOptIn" name="marketingOptIn" />
                            I’d like to receive occasional emails about new courses, discounts, and resources.
                        </label>
                        <label class="checkbox-label">
                            <input type="checkbox" id="consent" name="consent" required />
                            I agree to be contacted about my enquiry and have read the
                            <a href="#" class="text-blue font-weight-bold"><u>Privacy Notice</u></a>. *
                        </label>
                    </div>

                    <!-- Hidden UTM + Honeypot -->
                    <input type="hidden" name="utm_source" id="utm_source" />
                    <input type="hidden" name="utm_medium" id="utm_medium" />
                    <input type="hidden" name="utm_campaign" id="utm_campaign" />
                    <input type="hidden" name="utm_term" id="utm_term" />
                    <input type="hidden" name="utm_content" id="utm_content" />
                    <input type="text" name="website" id="website" class="visually-hidden" tabindex="-1"
                        autocomplete="off" aria-hidden="true" />

                    <!-- Footer -->
                    <div class="enquiry-actions">
                        <p class="enquiry-note">
                            By submitting, you agree we may store and process your data to service your request.
                        </p>
                        <button type="submit" class="enquiry-btn">Send enquiry ▸</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>


<!-- Success Modal -->
<div id="enquirySuccessModal" class="enquiry-modal success-modal enquiry-hidden" role="dialog" aria-modal="true">
    <div class="enquiry-box text-center">
        <button class="enquiry-close" onclick="closeEnquirySuccess()" aria-label="Close">×</button>
        <div class="enquiry-success">
            <svg width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#16a34a"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
            <h2>Thank you!</h2>
            <p class="muted">
                One of our representatives or learning professionals will reach out soon.<br>
                Get ready for a <strong>personalized learning journey</strong> crafted just for you 🚀
            </p>
            <div style="margin-top:20px">
                <button class="enquiry-btn" onclick="closeEnquirySuccess()">OK</button>
            </div>
        </div>
    </div>
</div>
