describe('Municipal Council Admin Dashboard', () => {
    beforeEach(() => {
      // Log in as Municipal Council admin
      cy.visit('/login');
      cy.get('input[name=email]').type('council@gmail.com'); // Replace with actual municipal admin email
      cy.get('input[name=password]').type('123456789'); // Replace with correct password
      cy.get('button[type=submit]').click();
  
      // Wait for redirect after login
      cy.url().should('include', '/admin/municipal'); // Update if the actual route is different
    });
  
    it('Displays complaints and updates a complaint status', () => {
      // Visit the dashboard
      cy.visit('/admin/municipal'); // Confirm this is the route
  
      // Check the dashboard header
      cy.contains('Municipal Council Dashboard');
  
      // Ensure at least one complaint is shown
      cy.get('strong').first().should('exist');
  
      // Click "View Details" to verify link works (optional)
      cy.get('a')
        .contains('View Details')
        .first()
        .should('have.attr', 'href')
        .then((href) => {
          cy.visit(href); // Navigate to details page
          cy.go('back');  // Return to dashboard
        });
  
      // Update the status of the first complaint
      cy.get('form').first().within(() => {
        cy.get('select[name=status]').select('In Progress');
        cy.get('button[type=submit]').click();
      });
  
      // Confirm status text is updated (you may need to reload the page if status doesn’t update dynamically)
      cy.contains('In Progress').should('exist');
    });
  });
  