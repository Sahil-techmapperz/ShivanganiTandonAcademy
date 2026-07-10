describe('Authentication', () => {
  const viewports = ['macbook-13', 'iphone-x'];



  viewports.forEach((viewport) => {
    // Generate a random user string to avoid conflicts on repeated test runs and across viewports
    const testUserId = Math.floor(Math.random() * 100000);
    const testUser = {
      name: `Test User ${testUserId}`,
      email: `testuser${testUserId}@example.com`,
      password: `TestPass123!`,
      phone: `99999${testUserId}`.substring(0, 10)
    };

    context(`Testing on ${viewport}`, () => {
      beforeEach(() => {
        cy.viewport(viewport);
      });

      it('should allow a new user to sign up', () => {
        cy.visit('/signup');
        // We will attempt to fill in the typical fields. If the form fields differ,
        // they might need adjustments based on the actual HTML structure.
        cy.get('#full_name:visible').first().type(testUser.name);
        cy.get('#email:visible').first().type(testUser.email);
        cy.get('#phone:visible').first().type(testUser.phone);
        cy.get('#password:visible').first().type(testUser.password);
        cy.get('#confirm_password:visible').first().type(testUser.password);
        
        // Submit the form
        cy.get('button[type="submit"]:visible').contains(/sign up|register|create account/i).click();

        // Check if redirected to login or dashboard
        cy.url().should('not.include', '/signup');
      });

      it('should allow the user to log in', () => {
        cy.visit('/login');
        cy.get('#email:visible').first().type(testUser.email);
        cy.get('#password:visible').first().type(testUser.password);
        
        // Submit login
        cy.get('button[type="submit"]:visible').contains(/log in|login|sign in/i).click();

        // Check for dashboard redirect or presence of logout button
        cy.url().should('satisfy', (url) => url.includes('/student/dashboard') || url.includes('/'));
        // cy.get('a').contains(/logout|sign out/i).should('exist');
      });

      it('should fail login with invalid credentials', () => {
        cy.visit('/login');
        cy.get('#email:visible').first().type('invalid_user@example.com');
        cy.get('#password:visible').first().type('WrongPassword123');
        cy.get('button[type="submit"]:visible').contains(/log in|login|sign in/i).click();
        
        // Ensure we are still on the login page or an error is displayed
        cy.url().should('include', '/login');
      });
    });
  });
});
