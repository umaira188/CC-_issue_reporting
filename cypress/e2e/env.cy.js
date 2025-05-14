describe('Environmental Police Admin Dashboard', () => {
    beforeEach(() => {
      // Log in as Environmental Police Admin
      cy.visit('/login');
      cy.get('input[name=email]').type('envpolice@gmail.com'); // Replace with a valid env_police admin email
      cy.get('input[name=password]').type('123456789'); // Replace with the correct password
      cy.get('button[type=submit]').click();
  
      // Redirect to dashboard
      cy.url().should('include', '/admin/env-police'); // Update if the route is different
    });
  
    it('Displays complaints and updates a complaint status', () => {
      cy.visit('/admin/env-police'); // Update if route is different
  
      // Check for dashboard header
      cy.contains('Environmental Police Dashboard');
  
      // Check if a complaint appears
      cy.get('strong').first().should('exist'); // Confirm at least one complaint is listed
  
      // Click "View Details" for the first complaint
      cy.get('a')
        .contains('View Details')
        .first()
        .should('have.attr', 'href')
        .then((href) => {
          cy.visit(href); // Go to the detailed view
        });
  
      // Go back to dashboard to test status update
      cy.visit('/env-police-dashboard');
  
      // Update complaint status (this targets the first form)
      cy.get('form').first().within(() => {
        cy.get('select[name=status]').select('Completed');
        cy.get('button[type=submit]').click();
      });
  
      // Assert the status was updated (after form submission, optionally check for a success message or reload status)
      cy.contains('Completed').should('exist'); // May need to reload depending on implementation
    });
  });
  