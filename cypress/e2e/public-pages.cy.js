describe('Public Pages', () => {
  const viewports = ['macbook-13', 'iphone-x'];

  viewports.forEach((viewport) => {
    context(`Testing on ${viewport}`, () => {
      beforeEach(() => {
        cy.viewport(viewport);
      });

      it('should load the homepage and check main sections', () => {
        cy.visit('/');
        cy.contains('Shivangani Tandon Academy').should('exist');
        cy.get('a').contains('Login').should('exist');
      });

      it('should navigate to courses pages', () => {
        cy.visit('/best-enrolled-agent-academy');
        cy.contains('Enrolled Agent').should('exist');

        cy.visit('/usa-cma-course-online');
        cy.contains('CMA').should('exist');

        cy.visit('/ai-tax-professional-training');
        cy.contains('AI').should('exist');
      });

      it('should navigate to resources and blogs', () => {
        cy.visit('/us-taxation-study-material');
        cy.get('body').should('exist');

        cy.visit('/taxation-career-guides');
        cy.get('body').should('exist');
      });

      it('should navigate to legal pages', () => {
        cy.visit('/privacy-policy');
        cy.contains('Privacy Policy').should('exist');

        cy.visit('/terms-and-conditions');
        cy.contains('Terms of Use').should('exist');
      });
    });
  });
});
