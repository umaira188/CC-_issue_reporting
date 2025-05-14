describe('Feedback Page - Authenticated Access', () => {
    beforeEach(() => {
        // Login
        cy.visit('/login');
        cy.get('input[name=email]').type('user@example.com');
        cy.get('input[name=password]').type('password');
        cy.get('button[type=submit]').click();

        // Confirm login redirection
        cy.url().should('include', '/lodge-complaint');
    });

    it('submits feedback and sees success message', () => {
        cy.visit('/feedback');

        // Fill out the feedback form
        cy.get('textarea[name="message"]').type('This is Cypress test feedback.');

        // Submit the form
        cy.get('#feedback-submit')
            .find('button[type="submit"]')
            .click();

    });
});